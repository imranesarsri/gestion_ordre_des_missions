
{% assign packages_json = site.data.packages_json %}

# {{competence}} - {{controle}}


<!-- Get List of packages -->
{% assign packages = '' | split: ',' %}
{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
{% if 
    page.order > 600 and  page.order < 700  
    and page.chapitre == true 
    and page.package != "global"
    and page.package != "pkg_rapport" 
    and page.controle == controle 
    and page.competence == competence 
%}
{% assign package = page.package | split: ',' %}  
{% assign packages = packages | concat: package %}
{%  endif %} 
{% endfor %}


{% assign packages = packages | uniq  %}  


{% for package_name in packages %}


{% assign package_obj = packages_json | where: 'name', package_name | first  %}
{% if package_name != "controle" %}
#  {{package_obj.titre}}
{% endif %}

{% assign pages = site.pages | sort: "order" %}


{% for page in pages %}
<!-- In tags with more than one and or or operator, operators are checked in order from right to left. -->


{% if affichage_analyse %}
{% if page.order > 300 
    and  page.order < 400 
    and page.chapitre == true 
    and page.package == package_name
%}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
{%  endif %} 
{%  endif %} 


{% if affichage_conception %}
{% if page.order > 500 
    and  page.order < 600
    and page.chapitre == true 
    and page.package == package_name
%}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
{%  endif %} 
{%  endif %} 


{% endfor %}


{% endfor %}


# Questions 

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
{% if  
    page.chapitre == true 
    and page.controle == controle
    and page.competence == competence
    and packages contains page.package
%}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
{%  endif %} 
{% endfor %}