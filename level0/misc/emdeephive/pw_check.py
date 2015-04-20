#!/usr/bin/env python
import hashlib, string, sys
from itertools import count,product

target = 'admin'


def validate(attempt):
    m = hashlib.md5()
    m.update(attempt.encode('ascii'))
    if target in h2a(m.hexdigest()):
        return True
    else:
        return False

def h2a(hexdigest):
    hexdig = hexdigest.encode('ascii')
    chunked = [hexdig[i:i+2] for i in range(0, len(hexdig), 2)]
    asc = ""
    for byt in chunked:
        try:
            asc += bytes.fromhex(byt.decode('ascii')).decode('ascii')
        except UnicodeDecodeError:
            pass
    return asc.lower()

def main():
    if(validate(sys.argv[1])):
        print("Success!")
    else:
        print("Failure!")

if __name__ == "__main__":
    main()
