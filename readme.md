# Membuat REST API data desa di Indonesia

Menggunakan Framework CodeIgniter 3
dengan menggunakan library dari https://github.com/ardisaurus/ci-restserver
REST API Documentation

## Base URL

http://localhost:8080/

## Endpoints

### 1. Get All Desa

**URL:** `api/desa`

**Method:** `GET`

**Success Response:**

```json
{
    "success": true,
    "data": [
        {
            "id": "1",
            "code": "1101012001",
            "district_code": "110101",
            "name": "KEUDE BAKONGAN",
            "meta": {
                "lat": "2.9300043",
                "long": "97.4732991",
                "pos": "23773"
            },
            "created_at": "2024-06-04 07:52:57",
            "updated_at": "2024-06-04 07:52:57"
        },
        ...
    ]
}
```

### 2. Get All Desa

**URL:** `api/desa/{id}`

**Method:** `GET`

URL Parameters:

-   id (integer): ID of the desa to retrieve.

**Success Response:**

```json
{
    "success": true,
    "data": {
        "id": "1",
        "district_code": "110101",
        "name": "KEUDE BAKONGAN",
        "districtName": "BAKONGAN",
        "cityName": "KABUPATEN ACEH SELATAN",
        "provinceName": "ACEH"
    }
}
```

**Error Response:**

```json
{
    "status": 404,
    "error": true,
    "message": "Data tidak ditemukan.",
    "data": null
}
```

### 3. Post Desa

**URL:** `api/desa`

**Method:** `POST`

Request Body:

```json
{
    "code": "1",
    "district_code": "1101",
    "name": "Tegal"
}
```

**Success Response:**

```json
{
    "success": true,
    "data": {
        "id": "83470",
        "district_code": "110101",
        "name": "Tegal",
        "districtName": "BAKONGAN",
        "cityName": "KABUPATEN ACEH SELATAN",
        "provinceName": "ACEH"
    }
}
```

**Error Response:**

```json
{
    "status": 400,
    "error": true,
    "message": [
        "district_id tidak boleh kosong",
        "district_id harus berupa angka"
    ],
    "data": null
}
```

### 4. Put Desa

**URL:** `api/desa/{id}`

**Method:** `PUT`

URL Parameters:

-   id (integer): ID of the desa to retrieve.

Request Body:

```json
{
    "code": "1",
    "district_code": "1101",
    "name": "Tegal"
}
```

**Success Response:**

```json
{
    "success": true,
    "data": {
        "id": "83470",
        "district_code": "110101",
        "name": "Tegal",
        "districtName": "BAKONGAN",
        "cityName": "KABUPATEN ACEH SELATAN",
        "provinceName": "ACEH"
    }
}
```

**Error Response:**

```json
{
    "status": 400,
    "error": true,
    "message": [
        "district_id tidak boleh kosong",
        "district_id harus berupa angka"
    ],
    "data": null
}
```

### 5. Delete Desa

**URL:** `api/desa/{id}`

**Method:** `DELETE`

URL Parameters:

-   id (integer): ID of the desa to retrieve.

**Success Response:**

```json
{
    "success": true,
    "message": "Data berhasil dihapus."
}
```

**Error Response:**

```json
{
    "success": false,
    "message": "Data tidak ditemukan."
}
```
