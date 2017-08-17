<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_dec4c6748a8c29bc259b2e0f5f1318d641ddab5e40adaac2bfb74c5cdd98066e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_12607634ef36e3d294e8aeea6e4270ce890f1654c1b194e3da6109c2fcf27009 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_12607634ef36e3d294e8aeea6e4270ce890f1654c1b194e3da6109c2fcf27009->enter($__internal_12607634ef36e3d294e8aeea6e4270ce890f1654c1b194e3da6109c2fcf27009_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_da8b533de8ec35f19fac5972ee8932265965c596a01b9606631a1bf49e455824 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_da8b533de8ec35f19fac5972ee8932265965c596a01b9606631a1bf49e455824->enter($__internal_da8b533de8ec35f19fac5972ee8932265965c596a01b9606631a1bf49e455824_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        echo twig_include($this->env, $context, "@Twig/images/favicon.png.base64");
        echo "\">
        <style>";
        // line 9
        echo twig_include($this->env, $context, "@Twig/exception.css.twig");
        echo "</style>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">";
        // line 15
        echo twig_include($this->env, $context, "@Twig/images/symfony-logo.svg");
        echo " Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">";
        // line 19
        echo twig_include($this->env, $context, "@Twig/images/icon-book.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">";
        // line 26
        echo twig_include($this->env, $context, "@Twig/images/icon-support.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "        ";
        echo twig_include($this->env, $context, "@Twig/base_js.html.twig");
        echo "
    </body>
</html>
";
        
        $__internal_12607634ef36e3d294e8aeea6e4270ce890f1654c1b194e3da6109c2fcf27009->leave($__internal_12607634ef36e3d294e8aeea6e4270ce890f1654c1b194e3da6109c2fcf27009_prof);

        
        $__internal_da8b533de8ec35f19fac5972ee8932265965c596a01b9606631a1bf49e455824->leave($__internal_da8b533de8ec35f19fac5972ee8932265965c596a01b9606631a1bf49e455824_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_496c9363ba97b1fa9e1b0991640129874f7741b8dd9f950026976cd43e4bc281 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_496c9363ba97b1fa9e1b0991640129874f7741b8dd9f950026976cd43e4bc281->enter($__internal_496c9363ba97b1fa9e1b0991640129874f7741b8dd9f950026976cd43e4bc281_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_99adf48bec5bc6f7143386e04058a5be522bd5752ea1f74202b0e82e677c34a2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_99adf48bec5bc6f7143386e04058a5be522bd5752ea1f74202b0e82e677c34a2->enter($__internal_99adf48bec5bc6f7143386e04058a5be522bd5752ea1f74202b0e82e677c34a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_99adf48bec5bc6f7143386e04058a5be522bd5752ea1f74202b0e82e677c34a2->leave($__internal_99adf48bec5bc6f7143386e04058a5be522bd5752ea1f74202b0e82e677c34a2_prof);

        
        $__internal_496c9363ba97b1fa9e1b0991640129874f7741b8dd9f950026976cd43e4bc281->leave($__internal_496c9363ba97b1fa9e1b0991640129874f7741b8dd9f950026976cd43e4bc281_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_55f2add73fc6e15ef71a6bdfec4321d8be0743f964f150370c321c5ecfae4cad = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_55f2add73fc6e15ef71a6bdfec4321d8be0743f964f150370c321c5ecfae4cad->enter($__internal_55f2add73fc6e15ef71a6bdfec4321d8be0743f964f150370c321c5ecfae4cad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_7eeb7ae8ecd7f3c66b58eb3ba4b0dadca22d1240da856d6b88367e40db3bc24a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7eeb7ae8ecd7f3c66b58eb3ba4b0dadca22d1240da856d6b88367e40db3bc24a->enter($__internal_7eeb7ae8ecd7f3c66b58eb3ba4b0dadca22d1240da856d6b88367e40db3bc24a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_7eeb7ae8ecd7f3c66b58eb3ba4b0dadca22d1240da856d6b88367e40db3bc24a->leave($__internal_7eeb7ae8ecd7f3c66b58eb3ba4b0dadca22d1240da856d6b88367e40db3bc24a_prof);

        
        $__internal_55f2add73fc6e15ef71a6bdfec4321d8be0743f964f150370c321c5ecfae4cad->leave($__internal_55f2add73fc6e15ef71a6bdfec4321d8be0743f964f150370c321c5ecfae4cad_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_02369d61095a249773cc6d48e759ba88f1d73eab6ecaa733249ce8e394779495 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_02369d61095a249773cc6d48e759ba88f1d73eab6ecaa733249ce8e394779495->enter($__internal_02369d61095a249773cc6d48e759ba88f1d73eab6ecaa733249ce8e394779495_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_6266aa3916a87e2387e5e5cd9b0409c3a10df9aa464bb5c4803a92fe3c58c872 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6266aa3916a87e2387e5e5cd9b0409c3a10df9aa464bb5c4803a92fe3c58c872->enter($__internal_6266aa3916a87e2387e5e5cd9b0409c3a10df9aa464bb5c4803a92fe3c58c872_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6266aa3916a87e2387e5e5cd9b0409c3a10df9aa464bb5c4803a92fe3c58c872->leave($__internal_6266aa3916a87e2387e5e5cd9b0409c3a10df9aa464bb5c4803a92fe3c58c872_prof);

        
        $__internal_02369d61095a249773cc6d48e759ba88f1d73eab6ecaa733249ce8e394779495->leave($__internal_02369d61095a249773cc6d48e759ba88f1d73eab6ecaa733249ce8e394779495_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 33,  120 => 10,  103 => 7,  88 => 34,  86 => 33,  76 => 26,  66 => 19,  59 => 15,  53 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  33 => 4,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"{{ _charset }}\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>{% block title %}{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ include('@Twig/images/favicon.png.base64') }}\">
        <style>{{ include('@Twig/exception.css.twig') }}</style>
        {% block head %}{% endblock %}
    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">{{ include('@Twig/images/symfony-logo.svg') }} Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-book.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-support.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        {% block body %}{% endblock %}
        {{ include('@Twig/base_js.html.twig') }}
    </body>
</html>
", "@Twig/layout.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/layout.html.twig");
    }
}
