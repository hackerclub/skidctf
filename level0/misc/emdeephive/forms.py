from flask.ext.wtf import Form
from wtforms import TextField, TextAreaField, SubmitField, ValidationError, validators
import pw_check

def is_correct(form, field):
    if not pw_check.validate(field.data):
        raise ValidationError('Wrong password!')

class LoginForm(Form):
  password = TextField("Password",  [validators.Required("Please enter the admin password."), is_correct])
  submit = SubmitField("Send")
