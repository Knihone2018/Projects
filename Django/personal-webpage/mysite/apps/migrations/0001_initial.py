# Generated by Django 2.1.5 on 2019-01-07 21:22

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Detail',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=200)),
                ('details', models.TextField()),
            ],
        ),
        migrations.CreateModel(
            name='Project',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('rank', models.IntegerField(default=0)),
                ('type', models.CharField(max_length=200)),
                ('name', models.CharField(max_length=200)),
                ('image', models.ImageField(upload_to='images/')),
                ('details', models.ManyToManyField(to='apps.Detail')),
            ],
        ),
    ]
