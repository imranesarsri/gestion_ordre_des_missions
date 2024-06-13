---
layout: default
chapitre: false
package: Directeur
order: 1
---


{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.evaluation == "Directeur" %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
