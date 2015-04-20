from flask.ext.wtf import Form
from wtforms import TextField, PasswordField, TextAreaField, SubmitField, ValidationError, validators
import security

def valid_token(form, field):
    if not security.validate_token(field.data):
        raise ValidationError('Not a Valid Reset Token!')

class ResetPasswordRequestForm(Form):
  username = TextField("Username", [validators.Required()])
  submit = SubmitField("Request Password Reset")

class ResetPasswordConfirmForm(Form):
  token = TextField("Reset Token", [validators.Required(), 
    valid_token])
  password = PasswordField("New Password", [validators.Required(),
    validators.Length(min=10),
    validators.EqualTo('confirm')])
  confirm = PasswordField("Confirm Password")
  submit = SubmitField("Set New Password")

class LoginForm(Form):
  username = TextField("Username")
  password = PasswordField("Password")
  submit = SubmitField("Login")
