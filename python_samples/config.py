#!/usr/bin/python

# Uncomment next two lines to disable warnings for insecure connections
# from urllib3 import disable_warnings, exceptions as urllib3_exceptions
# disable_warnings(urllib3_exceptions.InsecureRequestWarning)

from requests import post
from json import dumps

FQDN = 'your_FQDN'  # IP, hostname or FQDN
PROTOCOL = 'https'
PORT = 12345
PASSWORD = 'my_password'
USERNAME = 'my_username'

def get_url(end_point):
    return PROTOCOL + '://'+ FQDN + ':'+str(PORT) + '/api/' +  end_point

def get_token():
    return post(
            get_url('token/refreshToken'),
            headers = { 'Content-type': 'application/json;charset=UTF-8' },
            verify = False,
            data = dumps({ 'username': USERNAME, 'password': PASSWORD })
            ).json()['results'][0]['token']

