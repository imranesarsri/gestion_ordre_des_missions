---
layout: presentation
chapitre: false
package: Directeur
order: 1
---

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.presentationEvaluation == "Directeur" %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
