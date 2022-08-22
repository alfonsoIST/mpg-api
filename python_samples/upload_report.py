#!/usr/bin/python
from sys import argv
from os import path
# Uncomment next two lines to disable warnings for insecure connections
# from urllib3 import disable_warnings, exceptions as urllib3_exceptions
# disable_warnings(urllib3_exceptions.InsecureRequestWarning)

from requests import get, post, exceptions
import json

from config import FQDN, PROTOCOL, PORT, USERNAME, PASSWORD, get_url, get_token


def read_data(filename):
    with open(filename, encoding='utf-8-sig') as f:
        json_data = json.load(f)
        print(json_data)
    return json_data


def upload_report(token, filename, data):
    headers = { 'Authorization': 'Bearer ' + token }
    url = get_url('extractor/uploadDocument')
    test_file = open(filename, "rb")
    r = post(url, verify=False, headers=headers, files = {"file": test_file}, data = {"data": json.dumps(data)})
    return r.json()


def main():
    if len(argv) != 3:
        print(' ERROR - Usage: ' + path.basename(argv[0]) + ' <filename> <json_data>')
        exit(0)
    token = get_token()
    filename = argv[1]
    json_file = argv[2]
    result = upload_report(token, filename, read_data(json_file))
    print(result)

if __name__ == "__main__":
    try:
        main()
    except KeyboardInterrupt:
        print('Command ended with keyboard interrupt')
        try:
            exit(0)
        except SystemExit:
            _exit(0)
