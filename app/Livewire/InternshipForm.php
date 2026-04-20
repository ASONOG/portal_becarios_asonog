<?php

namespace App\Livewire;

use App\Mail\SolicitudPractica;
use App\Models\InternshipApplication;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Livewire\WithFileUploads;

class InternshipForm extends Component
{
    use WithFileUploads;

    // Datos personales
    public string $email = '';
    public string $full_name = '';
    public string $phone = '';
    public string $department = '';
    public string $municipality = '';

    // Perfil académico
    public string $academic_level = '';
    public string $academic_level_other = '';
    public string $institution = '';
    public string $field_of_study = '';
    public string $semester = '';
    public ?string $requires_agreement = null;

    // Modalidad de interés
    public string $internship_type = '';
    public string $availability = '';
    public string $available_from = '';
    public string $estimated_duration = '';

    // Motivación
    public string $motivation = '';
    public ?string $has_community_experience = null;
    public string $source = '';
    public string $source_other = '';

    // Documento adjunto
    public $cv;

    // Estado
    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'email'               => ['required', 'email', 'max:150'],
            'full_name'           => ['required', 'string', 'max:255'],
            'phone'               => ['required', 'string', 'max:20'],
            'department'          => ['required', 'in:' . implode(',', InternshipApplication::DEPARTMENTS)],
            'municipality'        => ['required', 'string', 'max:100'],
            'academic_level'      => ['required', 'in:' . implode(',', array_keys(InternshipApplication::ACADEMIC_LEVELS))],
            'academic_level_other' => ['required_if:academic_level,otro', 'nullable', 'string', 'max:100'],
            'institution'         => ['required', 'string', 'max:255'],
            'field_of_study'      => ['required', 'string', 'max:255'],
            'semester'            => ['nullable', 'string', 'max:50'],
            'requires_agreement'  => ['nullable', 'in:1,0'],
            'internship_type'     => ['required', 'in:' . implode(',', array_keys(InternshipApplication::TYPES))],
            'availability'        => ['required', 'in:' . implode(',', array_keys(InternshipApplication::AVAILABILITY))],
            'available_from'      => ['nullable', 'date', 'after_or_equal:today'],
            'estimated_duration'  => ['required', 'in:' . implode(',', array_keys(InternshipApplication::DURATION))],
            'motivation'          => ['required', 'string', 'max:2000'],
            'has_community_experience' => ['nullable', 'in:1,0'],
            'source'              => ['nullable', 'in:' . implode(',', array_keys(InternshipApplication::SOURCES))],
            'source_other'        => ['required_if:source,otro', 'nullable', 'string', 'max:100'],
            'cv'                  => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ];
    }

    protected function messages(): array
    {
        return [
            'email.required'          => 'El correo electrónico es obligatorio.',
            'email.email'             => 'Ingresa un correo electrónico válido.',
            'full_name.required'      => 'El nombre completo es obligatorio.',
            'phone.required'          => 'El número de teléfono es obligatorio.',
            'department.required'     => 'El departamento es obligatorio.',
            'department.in'           => 'Selecciona un departamento válido.',
            'municipality.required'   => 'El municipio es obligatorio.',
            'academic_level.required' => 'El nivel académico es obligatorio.',
            'academic_level.in'       => 'Selecciona un nivel académico válido.',
            'academic_level_other.required_if' => 'Especifica tu nivel académico.',
            'institution.required'    => 'La universidad o institución es obligatoria.',
            'field_of_study.required' => 'La carrera o área de formación es obligatoria.',
            'internship_type.required' => 'El tipo de vinculación es obligatorio.',
            'internship_type.in'      => 'Selecciona un tipo de vinculación válido.',
            'availability.required'   => 'La disponibilidad horaria es obligatoria.',
            'availability.in'         => 'Selecciona una disponibilidad válida.',
            'available_from.after_or_equal' => 'La fecha de inicio debe ser hoy o posterior.',
            'estimated_duration.required' => 'La duración estimada es obligatoria.',
            'estimated_duration.in'   => 'Selecciona una duración válida.',
            'motivation.required'     => 'La motivación es obligatoria.',
            'motivation.max'          => 'La motivación no debe exceder 2000 caracteres.',
            'source_other.required_if' => 'Especifica cómo te enteraste.',
            'cv.mimes'                => 'El archivo debe ser un PDF.',
            'cv.max'                  => 'El archivo no debe pesar más de 10 MB.',
        ];
    }

    public function submit(): void
    {
        $key = 'internship-form:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $this->addError('email', 'Demasiados intentos. Intenta de nuevo más tarde.');
            return;
        }

        RateLimiter::hit($key, 3600);

        $this->validate();

        $cvPath = null;
        if ($this->cv) {
            $cvPath = $this->cv->store('cv', 'public');
        }

        $application = InternshipApplication::create([
            'email'                    => $this->email,
            'full_name'                => $this->full_name,
            'phone'                    => $this->phone,
            'department'               => $this->department,
            'municipality'             => $this->municipality,
            'academic_level'           => $this->academic_level,
            'academic_level_other'     => $this->academic_level === 'otro' ? $this->academic_level_other : null,
            'institution'              => $this->institution,
            'field_of_study'           => $this->field_of_study,
            'semester'                 => $this->semester ?: null,
            'requires_agreement'       => $this->requires_agreement !== null ? (bool) $this->requires_agreement : null,
            'internship_type'          => $this->internship_type,
            'availability'             => $this->availability,
            'available_from'           => $this->available_from ?: null,
            'estimated_duration'       => $this->estimated_duration,
            'motivation'               => $this->motivation,
            'has_community_experience' => $this->has_community_experience !== null ? (bool) $this->has_community_experience : null,
            'source'                   => $this->source ?: null,
            'source_other'             => $this->source === 'otro' ? $this->source_other : null,
            'cv_path'                  => $cvPath,
        ]);

        Mail::to(config('mail.notification_email', config('mail.from.address')))->send(new SolicitudPractica($application));

        $this->reset([
            'email', 'full_name', 'phone', 'department', 'municipality',
            'academic_level', 'academic_level_other', 'institution', 'field_of_study', 'semester', 'requires_agreement',
            'internship_type', 'availability', 'available_from', 'estimated_duration',
            'motivation', 'has_community_experience', 'source', 'source_other', 'cv',
        ]);

        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.internship-form');
    }
}
