from django.db import models
import os
import imghdr
from os import listdir
from os.path import isfile, join
from django.conf import settings
from django.contrib import admin

class Category(models.Model):
    name = models.CharField(max_length=100)
    thumb = models.CharField(max_length=100)

    def __unicode__(self):
        return u'%s' % (self.name)

class Portfolio(models.Model):
    title = models.CharField(max_length=255)
    description = models.CharField(max_length=1000)
    keywords = models.CharField(max_length=255)
    github = models.URLField(blank=True)
    download = models.CharField(max_length=255,blank=True)
    images = models.CharField(max_length=100,blank=True)
    category = models.ForeignKey(Category)

    def keyword(self):
     return self.keywords.split(',')

    def pics(self):
        mypath = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), 'mysite\\static\\portfolio\\' + self.images)
        allpics = [ f for f in listdir(mypath) if isfile(join(mypath,f)) and imghdr.what(join(mypath,f)) ]
        return allpics

    def __unicode__(self):
        return u'%s' % (self.title)

class Developers(models.Model):
    name = models.CharField(max_length=255)
    url = models.URLField()
    cat = models.CharField(max_length=100)

    def __unicode__(self):
        return u'%s' % (self.name)