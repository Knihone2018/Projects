from django.core.management.base import BaseCommand
from django.contrib.auth.models import User


import os
class Command(BaseCommand):

    def handle(self, *args, **options):
        if not User.objects.filter(username=os.environ['RDS_USERNAME']).exists():
            User.objects.create_superuser(os.environ['RDS_USERNAME'], "", os.environ['RDS_PASSWORD'])
