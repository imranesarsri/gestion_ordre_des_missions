---
layout: presentation
chapitre: false
package: directeur
order: 1
---

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.presentationEvaluation == "directeur" %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
