from django.contrib import admin

# Register your models here.

from .models import Question, Choice

class ChoiceInLine(admin.TabularInline):
    #admin.StackedInLine
    model = Choice
    extra = 3

class QuestionAdamin(admin.ModelAdmin):
    #fields = ['pub_date', 'question_text']
    fieldsets = [
        (None,                  {'fields': ['question_text']}),
        ('Date information',    {'fields': ['pub_date'], 'classes': ['collapse']})
    ]
    inlines = [ChoiceInLine]
    list_display = ('question_text', 'pub_date', 'was_published_recently')
    list_filter = ['pub_date']
    search_fields = ['question_text']

admin.site.register(Question, QuestionAdamin)
#admin.site.register(Choice)
