from flask import Flask, render_template, request, flash
from forms import ResetPasswordRequestForm, ResetPasswordConfirmForm, LoginForm
import random
import time

app = Flask(__name__)

WTF_CSRF_ENABLED = False
app.secret_key = 'p1ckl1ng_sux_2pac'

@app.route('/')
def home():
  return render_template('home.html')

@app.route('/resetrequest', methods=['GET', 'POST'])
def resetrequest():
  form = ResetPasswordRequestForm(csrf_enabled=False)

  if request.method == 'POST':
    if form.username.data != 'admin':
      return render_template('resetrequest.html', invalid=True, form=form)
    else:

      seed = int(time.time())
      random.seed(seed)
      expiration = seed + (60 * 10)
      token = random.randint(0, 2 ** 32)

      t = open('data/token', 'w')
      t.write(str(token) + ':' + str(expiration))
      t.close()
      return render_template('resetrequest.html', success=True, form=form)

  return render_template('resetrequest.html', form=form)

@app.route('/resetconfirm', methods=['GET', 'POST'])
def resetconfirm():
  form = ResetPasswordConfirmForm(csrf_enabled=False)

  if request.method == 'POST':
    if not form.validate():
      return render_template('resetconfirm.html', form=form)
    else:
      c = open('data/creds', 'w')
      c.write('admin:' + form.password.data)
      c.close()
      return render_template('resetconfirm.html', success=True, form=form)

  return render_template('resetconfirm.html', form=form)

@app.route('/login', methods=['GET', 'POST'])
def login():
  form = LoginForm()

  if request.method == 'POST':
    username, password = open('data/creds').read().strip().split(':')
    if (form.username.data == username) and (form.password.data == password):
      return render_template('login.html', success=True)
    else:
      return render_template('login.html', form=form)
  else:
    return render_template('login.html', form=form)
    
  
if __name__ == '__main__':
  app.run(host='0.0.0.0', port=10001)
