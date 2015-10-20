from django.contrib import admin
from mysite.models import Developers,Category,Portfolio

class CatAdmin(admin.ModelAdmin):
    list_display = ('name','thumb','id')

class DevAdmin(admin.ModelAdmin):
    list_display = ('name','url','cat')
    search_fields = ('name','cat')

class PortAdmin(admin.ModelAdmin):
    list_display = ('title','description','images')
    search_fields = ('title','description')

admin.site.register(Category, CatAdmin)
admin.site.register(Developers,DevAdmin)
admin.site.register(Portfolio,PortAdmin)