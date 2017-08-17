<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_5e3576c4e87579d229bae2e2d17a6a4f97fb53b3814acbd4c7e76fecfd2048d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7fca90fe1c6fe99b359fb60d2770594014b6c3a9d802f273ee1ea8b576b36623 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7fca90fe1c6fe99b359fb60d2770594014b6c3a9d802f273ee1ea8b576b36623->enter($__internal_7fca90fe1c6fe99b359fb60d2770594014b6c3a9d802f273ee1ea8b576b36623_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_4c43dd0df15d9b49fb0fc9181c685919ecfbee17c85edca586d18545456f77a2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4c43dd0df15d9b49fb0fc9181c685919ecfbee17c85edca586d18545456f77a2->enter($__internal_4c43dd0df15d9b49fb0fc9181c685919ecfbee17c85edca586d18545456f77a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7fca90fe1c6fe99b359fb60d2770594014b6c3a9d802f273ee1ea8b576b36623->leave($__internal_7fca90fe1c6fe99b359fb60d2770594014b6c3a9d802f273ee1ea8b576b36623_prof);

        
        $__internal_4c43dd0df15d9b49fb0fc9181c685919ecfbee17c85edca586d18545456f77a2->leave($__internal_4c43dd0df15d9b49fb0fc9181c685919ecfbee17c85edca586d18545456f77a2_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_57bad306b499acfc90fa07eb3faa97af716404d216a921d571811020399ee020 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_57bad306b499acfc90fa07eb3faa97af716404d216a921d571811020399ee020->enter($__internal_57bad306b499acfc90fa07eb3faa97af716404d216a921d571811020399ee020_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_24e1c89284ea3e8be63d9454167c5557f8d8118b8b086a55a6f6147c8ffad4ff = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_24e1c89284ea3e8be63d9454167c5557f8d8118b8b086a55a6f6147c8ffad4ff->enter($__internal_24e1c89284ea3e8be63d9454167c5557f8d8118b8b086a55a6f6147c8ffad4ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
";
        
        $__internal_24e1c89284ea3e8be63d9454167c5557f8d8118b8b086a55a6f6147c8ffad4ff->leave($__internal_24e1c89284ea3e8be63d9454167c5557f8d8118b8b086a55a6f6147c8ffad4ff_prof);

        
        $__internal_57bad306b499acfc90fa07eb3faa97af716404d216a921d571811020399ee020->leave($__internal_57bad306b499acfc90fa07eb3faa97af716404d216a921d571811020399ee020_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_c02171d620ab98a53877695bc55bdd1d973593d3cb59bb72ed4cc55d135a2d16 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c02171d620ab98a53877695bc55bdd1d973593d3cb59bb72ed4cc55d135a2d16->enter($__internal_c02171d620ab98a53877695bc55bdd1d973593d3cb59bb72ed4cc55d135a2d16_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_b08ee28d79e24d5965558e31b3ae1432de3fe4a6eb53fddb40ff428d62dd4665 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b08ee28d79e24d5965558e31b3ae1432de3fe4a6eb53fddb40ff428d62dd4665->enter($__internal_b08ee28d79e24d5965558e31b3ae1432de3fe4a6eb53fddb40ff428d62dd4665_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new Twig_Error_Runtime('Variable "exception" does not exist.', 137, $this->getSourceContext()); })()), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) || array_key_exists("status_code", $context) ? $context["status_code"] : (function () { throw new Twig_Error_Runtime('Variable "status_code" does not exist.', 137, $this->getSourceContext()); })()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) || array_key_exists("status_text", $context) ? $context["status_text"] : (function () { throw new Twig_Error_Runtime('Variable "status_text" does not exist.', 137, $this->getSourceContext()); })()), "html", null, true);
        echo ")
";
        
        $__internal_b08ee28d79e24d5965558e31b3ae1432de3fe4a6eb53fddb40ff428d62dd4665->leave($__internal_b08ee28d79e24d5965558e31b3ae1432de3fe4a6eb53fddb40ff428d62dd4665_prof);

        
        $__internal_c02171d620ab98a53877695bc55bdd1d973593d3cb59bb72ed4cc55d135a2d16->leave($__internal_c02171d620ab98a53877695bc55bdd1d973593d3cb59bb72ed4cc55d135a2d16_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_4316a71913cfe6a4bcbe6ba66493d772105df2a0f9fcc959af1951d974d66213 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4316a71913cfe6a4bcbe6ba66493d772105df2a0f9fcc959af1951d974d66213->enter($__internal_4316a71913cfe6a4bcbe6ba66493d772105df2a0f9fcc959af1951d974d66213_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_c77bd9bea9ffb7bb886e72f2b0eeab97b160d23c53868f8e8ded532806e40057 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c77bd9bea9ffb7bb886e72f2b0eeab97b160d23c53868f8e8ded532806e40057->enter($__internal_c77bd9bea9ffb7bb886e72f2b0eeab97b160d23c53868f8e8ded532806e40057_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_c77bd9bea9ffb7bb886e72f2b0eeab97b160d23c53868f8e8ded532806e40057->leave($__internal_c77bd9bea9ffb7bb886e72f2b0eeab97b160d23c53868f8e8ded532806e40057_prof);

        
        $__internal_4316a71913cfe6a4bcbe6ba66493d772105df2a0f9fcc959af1951d974d66213->leave($__internal_4316a71913cfe6a4bcbe6ba66493d772105df2a0f9fcc959af1951d974d66213_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 141,  217 => 140,  200 => 137,  191 => 136,  51 => 4,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
