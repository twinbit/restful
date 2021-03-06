<?php


/**
 * @file
 * Contains RestfulInterface.
 */

interface RestfulInterface {

  /**
   * HTTP methods.
   */
  const GET = 'get';
  const PUT = 'put';
  const POST = 'post';
  const PATCH = 'patch';
  const OPTIONS = 'options';
  const HEAD = 'head';
  const TRACE = 'trace';
  const DELETE = 'delete';
  const CONNECT = 'connect';

  /**
   * Token value for token generation functions.
   */
  const TOKEN_VALUE = 'rest';

  /**
   * Constructor for the RESTful handler.
   *
   * @param $plugin
   *   The restful plugin object.
   * @param RestfulAuthenticationManager $auth_manager
   *   Injected authentication manager.
   * @param DrupalCacheInterface $cache_controller
   *   Injected cache controller.
   */
  public function __construct($plugin, \RestfulAuthenticationManager $auth_manager = NULL, \DrupalCacheInterface $cache_controller = NULL);

  /**
   * Entry point to process a request.
   *
   * @param string $path
   *   The requested path.
   * @param array $request
   *   The request array
   * @param string $method
   *   The HTTP method.
   *
   * @return mixed
   *   The return value can depend on the controller for the current $method.
   */
  public function process($path = '', $request = NULL, $method = \RestfulInterface::GET);

  /**
   * Return the properties that should be public.
   *
   * @return array
   */
  public function getPublicFields();

  /**
   * Return array keyed by the header property, and the value.
   *
   * This can be used for example to change the "Status" code of the HTTP
   * response, or to add a "Location" property.
   *
   * @return array
   */
  public function getHttpHeaders();

  /**
   * Determine if user can access the handler.
   *
   * @return bool
   *   TRUE if the current request has access to the requested resource. FALSE
   *   otherwise.
   */
  public function access();
}
