#!/usr/bin/env python
import string
import time

def validate_token(token):

  try:
    vtoken, expiration = open('data/token').read().split(':')
  except IOError:
    return False

  if int(time.time()) > int(expiration):
    return False

  return int(vtoken) == int(token)
