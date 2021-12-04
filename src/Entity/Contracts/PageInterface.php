<?php


namespace App\Entity\Contracts;


interface PageInterface
{
    public function getPath(): ?string;

    public function getModifyDate(): ?\DateTimeInterface;

    public function getMetaTitle(): ?string;

    public function getH1(): ?string;

    public function getMetaDescription(): ?string;

    public function getBrandName(): string;

    public function getName();

    /**
     * Возвращает путь из таблицы content или объект PageInterface
     * @return string|PageInterface
     */
    public function getParent();

    public function getBrandAndModelName(): string;
}