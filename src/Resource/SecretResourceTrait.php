<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Resource;

use Jane\OpenApiRuntime\Client\QueryParam;

trait SecretResourceTrait
{
    /**
     * @param array $parameters {
     *
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the secrets list. Available filters:

    - `names=<secret name>`

     * }
     *
     * @param string $fetch Fetch mode (object or response)
     *
     * @throws \Docker\API\Exception\SecretListInternalServerErrorException
     * @throws \Docker\API\Exception\SecretListServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|\Docker\API\Model\Secret
     */
    public function secretList(array $parameters = [], string $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam($this->streamFactory);
        $queryParam->addQueryParameter('filters', false, ['string']);
        $url = '/secrets';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT === $fetch) {
            if (200 === $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\Secret[]', 'json');
            }
            if (500 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretListInternalServerErrorException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (503 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretListServiceUnavailableException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
        }

        return $response;
    }

    /**
     * @param \Docker\API\Model\SecretsCreatePostBody $body
     * @param array                                   $parameters List of parameters
     * @param string                                  $fetch      Fetch mode (object or response)
     *
     * @throws \Docker\API\Exception\SecretCreateConflictException
     * @throws \Docker\API\Exception\SecretCreateInternalServerErrorException
     * @throws \Docker\API\Exception\SecretCreateServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|\Docker\API\Model\SecretsCreatePostResponse201
     */
    public function secretCreate(\Docker\API\Model\SecretsCreatePostBody $body, array $parameters = [], string $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam($this->streamFactory);
        $url = '/secrets/create';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Accept' => ['application/json'], 'Content-Type' => ['application/json']], $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($body, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT === $fetch) {
            if (201 === $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\SecretsCreatePostResponse201', 'json');
            }
            if (409 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretCreateConflictException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (500 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretCreateInternalServerErrorException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (503 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretCreateServiceUnavailableException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
        }

        return $response;
    }

    /**
     * @param string $id         ID of the secret
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @throws \Docker\API\Exception\SecretDeleteNotFoundException
     * @throws \Docker\API\Exception\SecretDeleteInternalServerErrorException
     * @throws \Docker\API\Exception\SecretDeleteServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function secretDelete(string $id, array $parameters = [], string $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam($this->streamFactory);
        $url = '/secrets/{id}';
        $url = str_replace('{id}', urlencode($id), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('DELETE', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT === $fetch) {
            if (204 === $response->getStatusCode()) {
                return null;
            }
            if (404 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretDeleteNotFoundException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (500 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretDeleteInternalServerErrorException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (503 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretDeleteServiceUnavailableException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
        }

        return $response;
    }

    /**
     * @param string $id         ID of the secret
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @throws \Docker\API\Exception\SecretInspectNotFoundException
     * @throws \Docker\API\Exception\SecretInspectInternalServerErrorException
     * @throws \Docker\API\Exception\SecretInspectServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|\Docker\API\Model\Secret
     */
    public function secretInspect(string $id, array $parameters = [], string $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam($this->streamFactory);
        $url = '/secrets/{id}';
        $url = str_replace('{id}', urlencode($id), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT === $fetch) {
            if (200 === $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\Secret', 'json');
            }
            if (404 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretInspectNotFoundException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (500 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretInspectInternalServerErrorException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (503 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretInspectServiceUnavailableException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
        }

        return $response;
    }

    /**
     * @param string                       $id         The ID of the secret
     * @param \Docker\API\Model\SecretSpec $body       The spec of the secret to update. Currently, only the Labels field can be updated. All other fields must remain unchanged from the [SecretInspect endpoint](#operation/SecretInspect) response values.
     * @param array                        $parameters {
     *
     *     @var int $version The version number of the secret object being updated. This is required to avoid conflicting writes.
     * }
     *
     * @param string $fetch Fetch mode (object or response)
     *
     * @throws \Docker\API\Exception\SecretUpdateNotFoundException
     * @throws \Docker\API\Exception\SecretUpdateInternalServerErrorException
     * @throws \Docker\API\Exception\SecretUpdateServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function secretUpdate(string $id, \Docker\API\Model\SecretSpec $body, array $parameters = [], string $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam($this->streamFactory);
        $queryParam->addQueryParameter('version', true, ['int']);
        $url = '/secrets/{id}/update';
        $url = str_replace('{id}', urlencode($id), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Accept' => ['application/json'], 'Content-Type' => ['application/json']], $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($body, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT === $fetch) {
            if (200 === $response->getStatusCode()) {
                return null;
            }
            if (404 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretUpdateNotFoundException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (500 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretUpdateInternalServerErrorException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
            if (503 === $response->getStatusCode()) {
                throw new \Docker\API\Exception\SecretUpdateServiceUnavailableException($this->serializer->deserialize((string) $response->getBody(), 'Docker\\API\\Model\\ErrorResponse', 'json'));
            }
        }

        return $response;
    }
}
