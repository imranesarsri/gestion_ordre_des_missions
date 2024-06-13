---
layout: default
chapitre: false
package: directeur
order: 1
---


{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.evaluation == "directeur" %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
