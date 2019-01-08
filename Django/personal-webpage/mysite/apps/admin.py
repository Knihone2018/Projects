from django.contrib import admin
from .models import Project
from .models import Detail
from .models import PDF

# Register your models here.
admin.site.register(Project)
admin.site.register(Detail)
admin.site.register(PDF)
