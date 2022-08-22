# IST-MPG REST API Samples


Samples API for IST MPG.

- Endpoint to generate access Token:
```bash
curl -X POST "https://<host>:<port>/api/token/refreshToken" -H "accept: application/json;charset=UTF-8" -H "Content-Type: application/json;charset=UTF-8" -d "{ \"password\": \"your_password\", \"username\": \"your_username\"}" -k
```

- Endpoint to list available documents, where PID is the Patient ID:
```bash
curl -X GET "https://<host>:<port>/api/documents/list?PID=<PID>" -H "accept: application/json;charset=UTF-8" -H "Authorization: Bearer <token>" -k
```

<details>
<summary>Sample response</summary>
<code style="white-space:nowrap;">
```bash
curl -X GET "https://<host>:<port>/api/documents/list?PID=<PID>" -H "accept: application/json;charset=UTF-8" -H "Authorization: Bearer <token>" -k
```
</code>
</details>

Sample response:
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


- Endpoint to download document, given the Document ID (DOCID):
```bash
curl -X GET "https://<host>:<port>/api/documents/download/<DOCID>" -H "accept: application/json;charset=UTF-8" -H "Authorization: Bearer <token>" -k
```
Sample response:
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

# License

This project is licensed under either of

 * Apache License, Version 2.0, ([LICENSE-APACHE](LICENSE-APACHE) or
   http://www.apache.org/licenses/LICENSE-2.0)
 * MIT license ([LICENSE-MIT](LICENSE-MIT) or
   http://opensource.org/licenses/MIT)

at your option.

### Contribution

Unless you explicitly state otherwise, any contribution intentionally submitted
for inclusion in this project, as defined in the Apache-2.0 license, shall be
dual licensed as above, without any additional terms or conditions.
