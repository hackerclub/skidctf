from flask import Flask, render_template, request, flash
from forms import LoginForm
import pw_check

app = Flask(__name__)

app.secret_key = 'welcome_to_you_have_come_to_zombocom'

@app.route('/')
def home():
  return render_template('home.html')

@app.route('/about')
def about():
  return render_template('about.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
  form = LoginForm()

  if request.method == 'POST':
    if form.validate() == False:
      flash('Please enter a valid password.')
      return render_template('login.html', form=form)
    if pw_check.validate(form.password.data):
      return render_template('login.html', success=True)
    else:
      flash('Invalid password!')
      return render_template('login.html', form=form)

  elif request.method == 'GET':
    return render_template('login.html', form=form)
  
if __name__ == '__main__':
  app.run(host='0.0.0.0')
