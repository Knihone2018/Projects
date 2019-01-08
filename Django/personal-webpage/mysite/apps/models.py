from django.db import models

# Create your models here.
class Detail(models.Model):
    name = models.CharField(max_length=200)
    details = models.TextField()
    def __str__(self):
        return self.details

class Project(models.Model):
    rank = models.IntegerField(default=0)
    type = models.CharField(max_length=200)
    name = models.CharField(max_length=200)
    details = models.ManyToManyField(Detail)
    image = models.ImageField(upload_to='images/')
    def __str__(self):
        return self.name

class PDF(models.Model):
    name = models.CharField(max_length=200)
    pdf = models.FileField(upload_to='files/')
    def __str__(self):
        return self.name
