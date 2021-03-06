<?php
namespace packages\base\Image;

use packages\base\IO\File;

class WEBP extends GD {

	/**
	 * Save the image to a file.
	 * 
	 * @param packages\base\IO\File $file
	 * @param int $quality
	 * @return void
	 */
	public function saveToFile(File $file, int $quality = 75): void {
		imagewebp($this->image, $file->getPath(), $quality);
	}

	/**
	 * Get format of current image.
	 * 
	 * @return string
	 */
	public function getExtension(): string {
		return 'webp';
	}

	/**
	 * Read the image from constructor file.
	 * 
	 * @throws InvalidImageFileException if gd library was unable to load a webp image from the file.
	 * @return void
	 */
	protected function fromFile(): void {
		$this->image = imagecreatefromwebp($this->file->getPath());
		if (!is_resource($this->image)) {
			throw new InvalidImageFileException($this->file);
		}
	}
}
