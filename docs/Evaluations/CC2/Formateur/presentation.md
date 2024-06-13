---
layout: presentation
chapitre: false
package: Formateur
order: 1
---

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.presentationEvaluation == "Formateur" %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
