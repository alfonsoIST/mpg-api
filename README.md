# IST-MPG REST API Samples

Version 1.3

Fri Sep  9 09:32:35 CEST 2022


Samples API for IST MPG. For additional information please contact support AT istmedical.com

## Curl Samples

### Endpoint to generate access Token:
Will provide you with an access token.
This token is required to call any other API endpoints.

```bash
curl -X POST "https://<host>:<port>/api/token/refreshToken" -H "accept: application/json;charset=UTF-8" -H "Content-Type: application/json;charset=UTF-8" -d "{ \"password\": \"your_password\", \"username\": \"your_username\"}" -k
```

<details>
<summary>Sample response</summary>

<code style="white-space:nowrap;">

```json
{
  "status": 200,
  "statusMessage": "Token generated correctly",
  "success": true,
  "timestamp": "01/01/2021 11:11:11 AM +0200",
  "results": [
    {
      "token": "token_string",
      "user": "your_username",
      "token_expire_time": "nn"
    }
  ]
}
```

</code>

</details>



### Endpoint to list available documents, where PID is the Patient ID:
```bash
curl -X GET "https://<host>:<port>/api/documents/list?PID=<PID>" -H "accept: application/json;charset=UTF-8" -H "Authorization: Bearer <token>" -k
```

<details>
<summary>Sample response</summary>

<code style="white-space:nowrap;">

```json
{
  "status": 200,
  "statusMessage": "Record found with PID : nnn",
  "success": true,
  "timestamp": "01/01/2021 11:11:11 AM +0200",
  "results": [
    {
      "PatientData": {
        "PatientName": "xx",
        "PatientID": "nn",
        "BirthDate": "1900-01-01",
        "PatientGenre": ""
      }
    },
    {
      "DocumentList": [
        {
          "IDDOC": "11fd4084-307c-4c2b-8aad-9a8311e9dcda",
          "StudyID": "study_id_number",
          "StudyDate": "20200202",
          "StudyDescription": "Description",
          "DocumentType": "Rich Document",
          "DocumentPages": "number of pages",
          "DocumentSize": "Size in MB",
          "StudyModality": "Modality",
          "ReferringPhysicianName": "Name"
        },
         {
          "IDDOC": "41fd4384-307c-4c2b-8a4d-9a3a1ae9dcdb",
          "StudyID": "study_id_number",
          "StudyDate": "20200202",
          "StudyDescription": "Description",
          "DocumentType": "Rich Document",
          "DocumentPages": "number of pages",
          "DocumentSize": "Size in MB",
          "StudyModality": "Modality",
          "ReferringPhysicianName": "Name"
        }
      ]
    }
  ]
}
```

</code>

</details>

### Endpoint to download document, given the Document ID (IDDOC):
```bash
curl -X GET "https://<host>:<port>/api/documents/download/<IDDOC>" -H "accept: application/json;charset=UTF-8" -H "Authorization: Bearer <token>" -k
```

<details>
<summary>Sample response</summary>

<code style="white-space:nowrap;">

```json
{
  "status": 200,
  "statusMessage": "Document Found with id : f3e0ecd3-74e3-4c81-a6af-1822a453562e",
  "success": true,
  "timestamp": "01/01/2021 11:11:11 AM +0200",
  "results": [
    {
      "PatientData": {
        "PatientName": "Patient Name",
        "PatientID": "patient_id",
        "BirthDate": "1970-01-01",
        "PatientGenre": ""
      }
    },
    {
      "publicPath": "public_path_of_pdf_document",
      "documentType": "Rich Document"
    }
  ]
}
```

</code>

</details>


## Python Sample Files

- [list_books.py](https://github.com/alfonsoIST/mpg-api/blob/master/python_samples/list_books.py)
- [download_books.py](https://github.com/alfonsoIST/mpg-api/blob/master/python_samples/download_books.py)
- [upload_report.py](https://github.com/alfonsoIST/mpg-api/blob/master/python_samples/upload_report.py)

## PHP Sample Files

- [list_books.php](https://github.com/alfonsoIST/mpg-api/blob/master/php_samples/list_books.php)
- [download_books.php](https://github.com/alfonsoIST/mpg-api/blob/master/php_samples/download_books.php)
- [upload_report.php](https://github.com/alfonsoIST/mpg-api/blob/master/php_samples/upload_report.php)

# License

These sample project files are licensed under either of

 * [Apache License, Version 2.0](https://www.apache.org/licenses/LICENSE-2.0.txt)
 * [MIT license](http://opensource.org/licenses/MIT)

at your option.

### Contribution

Unless you explicitly state otherwise, any contribution intentionally submitted
for inclusion in this project, as defined in the Apache-2.0 license, shall be
dual licensed as above, without any additional terms or conditions.
