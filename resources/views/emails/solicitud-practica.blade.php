<x-mail::message>
# Nueva solicitud de práctica

Se ha recibido una nueva solicitud a través del formulario de inscripción a prácticas, pasantías y voluntariados.

**Nombre:** {{ $application->full_name }}

**Correo:** {{ $application->email }}

**Teléfono:** {{ $application->phone }}

**Ubicación:** {{ $application->municipality }}, {{ $application->department }}

---

**Tipo de vinculación:** {{ $application->type_label }}

**Disponibilidad:** {{ $application->availability_label }}

**Duración estimada:** {{ $application->duration_label }}

**Nivel académico:** {{ $application->academic_level_label }}

**Institución:** {{ $application->institution }}

**Carrera:** {{ $application->field_of_study }}

---

<x-mail::button :url="route('admin.internships.show', $application)">
Ver solicitud completa
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
