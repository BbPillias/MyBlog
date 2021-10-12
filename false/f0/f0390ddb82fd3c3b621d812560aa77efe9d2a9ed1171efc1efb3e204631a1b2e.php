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

/* home.html.twig */
class __TwigTemplate_264dc0bbf21874fc3f24a999893c40639d35dd98c82678836f8c317bb31c8dd2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html.twig", "home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <h1>
        My Blog
    </h1>
    <span class=\"subheading\">
        A Blog about me
    </span>
";
    }

    // line 12
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "<!-- Main Content-->
    <main class=\"mb-4\">
        <div class=\"container px-4 px-lg-5\">
            <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                <div class=\"col-md-10 col-lg-8 col-xl-7\">
                    <h1 class=\"text-primary my-4\">Bérengère Pillias<br>Bienvenue sur mon blog !</h1>
                    <section class=\"container-fluid banner mb-0\">
                        <div class=\"col-md-3 col-lg-2 col-xl-1\">
                            <img class=\"photo\" src=\"public/assets/img/photo.JPG\" alt=\"Ma photo\">
                        </div>
                        <div class=\"inner-banner\">
                            <img class=\"logo\" src=\"#\" alt=\"Logo\">
                        </div>
                    </section>
                </div>
                <div class=\"col-md-10 col-lg-8 col-xl-7\">
                    <img src=\"public/assets/img/cv.PNG\">
                    <p class=\"text-center\"><a href=\"public/assets/cv.pdf\" download=\"cv_BérengèrePillias.pdf\"
                            title=\"Télécharger mon CV\" target=\"_blank\"><button
                                class=\"btn btn-primary\">Télécharger</button></a></p>
                </div>
            </div>
            <h3>Etudes :</h3>
            <p>J'ai intégré le 10 mai 2021 la formation de \"Développeur d'application - PHP/Symfony\" d'une duréee d'un
                an chez
                <a href=\"https://openclassrooms.com/fr/\" target=\"_blank\"
                    title=\"Ouvre le site Openclassrooms\">Openclassrooms</a>.</p>
            <p><img class=\"profil\" src=\"/public/assets/img/.jpg\" alt=\"\">J'ai commencé ma formation en 2020 pour passer
                le titre professionel développeur web et web mobile avec l'
                <a href=\"https://www.eni-ecole.fr/\" target=\"_blank\" title=\"Ouvre le site ENI\">ENI</a>.</p>
        </div>
    </main>

";
    }

    public function getTemplateName()
    {
        return "home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 13,  61 => 12,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home.html.twig", "C:\\MAMP\\htdocs\\MyBlog\\view\\home.html.twig");
    }
}
