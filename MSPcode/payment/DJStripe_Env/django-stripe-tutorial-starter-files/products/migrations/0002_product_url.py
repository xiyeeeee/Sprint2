# Generated by Django 3.1.6 on 2023-04-13 09:06

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('products', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='product',
            name='url',
            field=models.URLField(default='https://imgur.com/a/6F8fTrl'),
            preserve_default=False,
        ),
    ]
