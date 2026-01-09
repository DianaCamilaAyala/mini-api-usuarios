# Mini API de Usuarios | Digital Wonderland

> **Arquitectura minimalista. Respuestas consistentes. Diseño funcional.**

Esta es una API RESTful desarrollada con **Laravel 11** que gestiona el registro de integrantes en el ecosistema de *Digital Wonderland*. El proyecto prioriza la limpieza del código y la elegancia en la entrega de datos, eliminando el ruido técnico innecesario para el cliente final.

---

## Toque Minimalista
A diferencia de una API convencional, este proyecto implementa:
* **Encapsulamiento de Datos:** Solo se exponen los campos esenciales (`id`, `nombre`, `puesto`).
* **Respuestas Estructuradas:** Cada respuesta sigue el mismo patrón de éxito o error para facilitar la integración.
* **Filtros Discretos:** Capacidad de búsqueda por puesto mediante parámetros limpios en la URL.

---

## Especificaciones Técnicas

* **Framework:** Laravel 11 (PHP 8.x)
* **Base de Datos:** MySQL
* **Estandarización:** Respuestas en formato JSON nativo.

---

## Guía de Endpoints (Documentación)

La URL base para todas las peticiones es: `http://localhost:8000/api`

| Método | Ruta | Acción | Parámetro (Opcional) |
| :--- | :--- | :--- | :--- |
| `GET` | `/usuarios` | Listar todos los viajeros | `?puesto={cargo}` |
| `POST` | `/usuarios` | Registrar nuevo integrante | *(Requiere Body)* |
| `DELETE` | `/usuarios/{id}` | Remover del registro | |

### Ejemplo de Registro (POST)
**Body (JSON):**
```json
{
    "nombre": "Diana",
    "email": "diana@wonderland.com",
    "puesto": "Lead Developer"
}