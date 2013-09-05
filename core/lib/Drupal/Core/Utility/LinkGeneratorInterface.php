<?php

/**
 * @file
 * Contains \Drupal\Core\Utility\LinkGeneratorInterface.
 */

namespace Drupal\Core\Utility;

/**
 * Defines an interface for a service which generates a link out of a
 */
interface LinkGeneratorInterface {

  /**
   * Renders a link to a route given a route name and its parameters.
   *
   * This function correctly handles aliased paths and sanitizing text, so all
   * internal links output by modules should be generated by this function if
   * possible.
   *
   * However, for links enclosed in translatable text you should use t() and
   * embed the HTML anchor tag directly in the translated string. For example:
   * @code
   * t('Visit the <a href="@url">content types</a> page', array('@url' => Drupal::url('node_overview_types')));
   * @endcode
   * This keeps the context of the link title ('settings' in the example) for
   * translators.
   *
   * @param string|array $text
   *   The link text for the anchor tag as a translated string or render array.
   * @param string $route_name
   *   The name of the route to use to generate the link.
   * @param array $parameters
   *   (optional) Any parameters needed to render the route path pattern.
   * @param array $options
   *   (optional) An associative array of additional options. Defaults to an
   *   empty array. It may contain the following elements:
   *   - 'query': An array of query key/value-pairs (without any URL-encoding) to
   *     append to the URL.
   *   - absolute: Whether to force the output to be an absolute link (beginning
   *     with http:). Useful for links that will be displayed outside the site,
   *     such as in an RSS feed. Defaults to FALSE.
   *   - attributes: An associative array of HTML attributes to apply to the
   *     anchor tag. If element 'class' is included, it must be an array; 'title'
   *     must be a string; other elements are more flexible, as they just need
   *     to work as an argument for the constructor of the class
   *     Drupal\Core\Template\Attribute($options['attributes']).
   *   - html: Whether $text is HTML or just plain-text. For
   *     example, to make an image tag into a link, this must be set to TRUE, or
   *     you will see the escaped HTML image tag. $text is not sanitized if
   *     'html' is TRUE. The calling function must ensure that $text is already
   *     safe. Defaults to FALSE.
   *   - language: An optional language object. If the path being linked to is
   *     internal to the site, $options['language'] is used to determine whether
   *     the link is "active", or pointing to the current page (the language as
   *     well as the path must match).
   *
   * @return string
   *   An HTML string containing a link to the given route and parameters.
   *
   * @throws \Symfony\Component\Routing\Exception\RouteNotFoundException
   *   Thrown when the named route doesn't exist.
   * @throws \Symfony\Component\Routing\Exception\MissingMandatoryParametersException
   *   Thrown when some parameters are missing that are mandatory for the route.
   * @throws \Symfony\Component\Routing\Exception\InvalidParameterException
   *   Thrown when a parameter value for a placeholder is not correct because it
   *   does not match the requirement.
   *
   * @see \Drupal\Core\Routing\UrlGenerator::generateFromRoute()
   */
  public function generate($text, $route_name, array $parameters = array(), array $options = array());

}
