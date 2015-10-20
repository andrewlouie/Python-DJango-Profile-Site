from django.shortcuts import render
from django.http import HttpResponseRedirect
from datetime import datetime
from django.template.loader import get_template
from django.template import Context
from .models import Portfolio,Developers
from django.core.mail import send_mail
from django.core.mail import EmailMessage

def home(request):
    return render(request, 'index.html', {'year': datetime.now().year,'title': 'Welcome'})

def about(request):
    return render(request, 'about.html', {'year': datetime.now().year,'title': 'About Me'})

def contact(request):
    errors = []
    if request.method == 'POST':
        if not request.POST.get('name', ''):
            errors.append('Enter a name.')
        if not request.POST.get('message', ''):
            errors.append('Enter a message.')
        if request.POST.get('email') and '@' not in request.POST['email']:
            errors.append('Enter a valid e-mail address.')
        if not errors:
            send_mail('Website Contact Form',
                "You have received the following message via the website contact form from " +
                request.POST.get('name') +
                "\nPlease respond to " +
                request.POST.get('email') +
                " or phone " +
                request.POST.get('phone') + "\n\n" +
                request.POST['message'],
                'andrewlouie60@gmail.com',['andrew_louie@hotmail.com'],fail_silently=False
            )
            return HttpResponseRedirect('/thankyou/')
    return render(request, 'contact.html',{'errors': errors,'year': datetime.now().year,'title': 'Contact Me'})

def resume(request):
    return render(request, 'resume.html', {'year': datetime.now().year,'title': 'Resume'})

def developers(request):
    return render(request, 'developers.html', {'year': datetime.now().year,'title': 'Developer Resources','list':Developers.objects.order_by('cat') })

def portfolio(request):
    return render(request, 'portfolio.html', {'year': datetime.now().year,'title': 'Portfolio','list': Portfolio.objects.order_by('category','-id') })

def thankyou(request):
    return render(request, 'thankyou.html', {'year': datetime.now().year,'title': 'Thank You' })
