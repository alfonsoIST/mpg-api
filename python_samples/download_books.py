#!/usr/bin/python
from sys import argv
from os import path
# Uncomment next two lines to disable warnings for insecure connections
# from urllib3 import disable_warnings, exceptions as urllib3_exceptions
# disable_warnings(urllib3_exceptions.InsecureRequestWarning)

from requests import get, post, exceptions
import json

from config import FQDN, PROTOCOL, PORT, USERNAME, PASSWORD, get_url, get_token

def get_documents(token, patient_id):
    return get(
            get_url('documents/list?PID=' + patient_id),
            verify = False,
            headers = { 'Authorization': 'Bearer ' + token }
            ).json()


def wget_document(doc_path):
    url = PROTOCOL + '://' + doc_path
    result = get(url, verify=False)
    open('downloads/' +  path.basename(doc_path), 'wb').write(result.content)


def download_documents(token, doc_id):
    return get(
            get_url('documents/download/' + doc_id),
            verify = False,
            headers = { 'Authorization': 'Bearer ' + token }
            ).json()


def main():
    if len(argv) != 2:
        print(' ERROR - Usage: ' + path.basename(argv[0]) + ' <patient_id>')
        exit(0)
    token = get_token()
    patient_id = argv[1]
    result = get_documents(token, patient_id)
    for item in result['results'][1]['DocumentList']:
        result = download_documents(token, item['IDDOC'])
        doc_path = result['results'][1]['publicPath']
        print('Download URL: ', doc_path)
        wget_document(doc_path)

if __name__ == "__main__":
    try:
        main()
    except KeyboardInterrupt:
        print('Command ended with keyboard interrupt')
        try:
            exit(0)
        except SystemExit:
            _exit(0)
