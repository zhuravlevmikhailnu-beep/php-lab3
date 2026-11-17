<?php
namespace App;

class MagicClass
{
    private array $data = [];

    private static function say(string $text): void
    {
        echo $text . (PHP_SAPI === 'cli' ? PHP_EOL : '<br>' . PHP_EOL);
    }

    public function __construct()
    {
        self::say(__METHOD__);
    }

    public function __destruct()
    {
        self::say(__METHOD__);
    }

    public function __call(string $name, array $arguments)
    {
        self::say(__METHOD__ . " (метод $name, аргументы: " . implode(', ', $arguments) . ')');
    }

    public static function __callStatic(string $name, array $arguments)
    {
        self::say(__METHOD__ . " (метод $name, аргументы: " . implode(', ', $arguments) . ')');
    }

    public function __get(string $name)
    {
        self::say(__METHOD__ . " (свойство $name)");
        return $this->data[$name] ?? null;
    }

    public function __set(string $name, $value): void
    {
        self::say(__METHOD__ . " (свойство $name = $value)");
        $this->data[$name] = $value;
    }

    public function __isset(string $name): bool
    {
        self::say(__METHOD__ . " (свойство $name)");
        return isset($this->data[$name]);
    }

    public function __unset(string $name): void
    {
        self::say(__METHOD__ . " (свойство $name)");
        unset($this->data[$name]);
    }

    public function __sleep(): array
    {
        self::say(__METHOD__);
        return ['data'];
    }

    public function __wakeup(): void
    {
        self::say(__METHOD__);
    }

    public function __serialize(): array
    {
        self::say(__METHOD__);
        return ['data' => $this->data];
    }

    public function __unserialize(array $data): void
    {
        self::say(__METHOD__);
        $this->data = $data['data'];
    }

    public function __toString(): string
    {
        self::say(__METHOD__);
        return 'MagicClass как строка';
    }

    public function __invoke(...$args)
    {
        self::say(__METHOD__ . ' (аргументы: ' . implode(', ', $args) . ')');
    }

   public static function __set_state(array $properties)
    {
        self::say(__METHOD__);
        $obj = new static();
        $obj->data = $properties['data'];
        return $obj;
    }

    public function __clone()
    {
        self::say(__METHOD__);
    }

    public function __debugInfo(): array
    {
        self::say(__METHOD__);
        return ['data' => $this->data];
    }
}