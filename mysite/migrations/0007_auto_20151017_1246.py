# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('mysite', '0006_auto_20151017_1224'),
    ]

    operations = [
        migrations.CreateModel(
            name='Category',
            fields=[
                ('id', models.AutoField(serialize=False, verbose_name='ID', primary_key=True, auto_created=True)),
                ('name', models.CharField(max_length=100)),
                ('thumb', models.CharField(max_length=100)),
            ],
        ),
        migrations.CreateModel(
            name='Portfolio',
            fields=[
                ('id', models.AutoField(serialize=False, verbose_name='ID', primary_key=True, auto_created=True)),
                ('title', models.CharField(max_length=255)),
                ('description', models.CharField(max_length=1000)),
                ('keywords', models.CharField(max_length=255)),
                ('github', models.URLField()),
                ('download', models.CharField(max_length=255)),
                ('images', models.CharField(max_length=100)),
                ('category', models.ForeignKey(to='mysite.Category')),
            ],
        ),
        migrations.RemoveField(
            model_name='article',
            name='reporter',
        ),
        migrations.DeleteModel(
            name='Article',
        ),
        migrations.DeleteModel(
            name='Reporter',
        ),
    ]
