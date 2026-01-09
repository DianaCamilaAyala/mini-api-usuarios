# Mini API de Usuarios | Digital Wonderland

Este proyecto forma parte de mi ecosistema de desarrollo personal. Es una **API RESTful** construida con **Laravel 11**, diseñada para demostrar el manejo de operaciones CRUD, validación de datos y respuestas estandarizadas en formato JSON.

> **Propósito:** Servir como un motor de datos (Backend) desacoplado, capaz de alimentar aplicaciones web o móviles.

---

## Tecnologías Utilizadas

* **Framework:** Laravel 11
* **Lenguaje:** PHP 8.x
* **Base de Datos:** MySQL
* **Herramienta de Pruebas:** Thunder Client / Postman

---

## Funcionalidades Técnicas

* **Arquitectura MVC:** Separación clara entre el modelo de datos y la lógica de control.
* **Validación de Datos:** Reglas estrictas para asegurar que cada entrada sea válida y única (ej. email único).
* **Manejo de Respuestas:** Códigos de estado HTTP precisos (201 para creación, 404 para no encontrado, 200 para éxito).

---

## Endpoints (Rutas de la API)

La URL base es: `http://localhost:8000/api`

| Método | Endpoint | Descripción |
| :--- | :--- | :--- |
| **GET** | `/usuarios` | Retorna una lista de todos los usuarios registrados. |
| **POST** | `/usuarios` | Registra un nuevo usuario (requiere JSON en el body). |
| **PUT** | `/usuarios/{id}` | Actualiza la información de un usuario existente. |
| **DELETE** | `/usuarios/{id}` | Elimina permanentemente un usuario de la base de datos. |

### Ejemplo de JSON para POST/PUT:
```json
{
    "nombre": "Dian Dev",
    "email": "dian@wonderland.com",
    "puesto": "Full Stack Developer"
}