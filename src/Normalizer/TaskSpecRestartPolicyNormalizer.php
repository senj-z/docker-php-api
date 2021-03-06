<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TaskSpecRestartPolicyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\TaskSpecRestartPolicy';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Docker\API\Model\TaskSpecRestartPolicy;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \Docker\API\Model\TaskSpecRestartPolicy();
        if (property_exists($data, 'Condition') && $data->{'Condition'} !== null) {
            $object->setCondition($data->{'Condition'});
        }
        if (property_exists($data, 'Delay') && $data->{'Delay'} !== null) {
            $object->setDelay($data->{'Delay'});
        }
        if (property_exists($data, 'MaxAttempts') && $data->{'MaxAttempts'} !== null) {
            $object->setMaxAttempts($data->{'MaxAttempts'});
        }
        if (property_exists($data, 'Window') && $data->{'Window'} !== null) {
            $object->setWindow($data->{'Window'});
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getCondition()) {
            $data->{'Condition'} = $object->getCondition();
        }
        if (null !== $object->getDelay()) {
            $data->{'Delay'} = $object->getDelay();
        }
        if (null !== $object->getMaxAttempts()) {
            $data->{'MaxAttempts'} = $object->getMaxAttempts();
        }
        if (null !== $object->getWindow()) {
            $data->{'Window'} = $object->getWindow();
        }

        return $data;
    }
}
