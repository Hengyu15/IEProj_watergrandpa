<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* display/results/page_selector.twig */
class __TwigTemplate_f0375748a219413518664ee68415f62f4d9f1ac2ac553b1f8a6ef4f1c0b68c36 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<td>
  <form action=\"";
        // line 2
        echo PhpMyAdmin\Url::getFromRoute("/sql");
        echo "\" method=\"post\">
    ";
        // line 3
        echo PhpMyAdmin\Url::getHiddenInputs(($context["url_params"] ?? null));
        echo "
    ";
        // line 4
        echo ($context["page_selector"] ?? null);
        echo "
  </form>
</td>
";
    }

    public function getTemplateName()
    {
        return "display/results/page_selector.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "display/results/page_selector.twig", "/bitnami/wordpress/wp-content/plugins/wp-phpmyadmin-extension/lib/phpMyAdmin_K9HFIN3zySU70arXlLkZ5qv/templates/display/results/page_selector.twig");
    }
}