---
layout: default
order: 1
---

# Rapports

<a href="/gestion-personnels/pkg_global/rapport"> Rapport globale </a> 

## Par packages

<ul>
  {% for package in site.data.packages %}
    <li> <a href="/gestion-personnels/{{ package }}/rapport"> {{ package }} </a> </li>
  {% endfor %}
</ul>

# Evaluation

## Maquettages
<ul>
  {% for evaluation in site.data.evaluations.evaluations %}
    <li>
      {{ evaluation.name }}
      <ul>
        {% for item in evaluation.items %}
              <li> <a href="/gestion-personnels/Evaluations/{{ evaluation.name }}/{{ item }}/rapport"> {{ item }} </a> </li>
        {% endfor %}
      </ul>
    </li>
  {% endfor %}
</ul>
