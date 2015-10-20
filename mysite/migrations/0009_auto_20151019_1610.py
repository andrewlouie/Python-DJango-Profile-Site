# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('mysite', '0008_developers'),
    ]

    operations = [
        migrations.AlterField(
            model_name='portfolio',
            name='download',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AlterField(
            model_name='portfolio',
            name='github',
            field=models.URLField(blank=True),
        ),
        migrations.AlterField(
            model_name='portfolio',
            name='images',
            field=models.CharField(blank=True, max_length=100),
        ),
    ]
