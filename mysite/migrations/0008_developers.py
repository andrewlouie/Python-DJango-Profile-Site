# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('mysite', '0007_auto_20151017_1246'),
    ]

    operations = [
        migrations.CreateModel(
            name='Developers',
            fields=[
                ('id', models.AutoField(verbose_name='ID', primary_key=True, auto_created=True, serialize=False)),
                ('name', models.CharField(max_length=255)),
                ('url', models.URLField()),
                ('cat', models.CharField(max_length=100)),
            ],
        ),
    ]
