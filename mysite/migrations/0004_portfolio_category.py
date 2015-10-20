# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('mysite', '0003_remove_portfolio_category'),
    ]

    operations = [
        migrations.AddField(
            model_name='portfolio',
            name='category',
            field=models.IntegerField(default=1),
            preserve_default=False,
        ),
    ]
