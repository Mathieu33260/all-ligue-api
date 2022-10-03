<?php

namespace App\Validator\User;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueUsernameValidator extends ConstraintValidator
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function validate($value, Constraint $constraint)
    {
        /* @var UniqueUsername $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        /** @var UserRepository $userRepository */
        $userRepository = $this->em->getRepository(User::class);

        if ($userRepository->findOneBy(['userName' => $value])) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
