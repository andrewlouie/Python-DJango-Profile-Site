# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('mysite', '0004_portfolio_category'),
    ]

    operations = [
        migrations.AlterField(
            model_name='portfolio',
            name='category',
            field=models.ForeignKey(to='mysite.Categories'),
        ),
        migrations.AlterField(
            model_name='portfolio',
            name='download',
            field=models.CharField(null=True, max_length=255, blank=True),
        ),
        migrations.AlterField(
            model_name='portfolio',
            name='github',
            field=models.URLField(null=True, blank=True),
        ),
        migrations.AlterField(
            model_name='portfolio',
            name='images',
            field=models.CharField(null=True, max_length=50, blank=True),
        ),
    ]
