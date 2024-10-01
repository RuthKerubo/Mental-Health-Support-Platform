<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase; 
use App\Models\Category;
use App\Models\Resource;


class ResourceCategorizationTest extends TestCase
{
    use RefreshDatabase; 

    /** @test 1 */
    public function a_resource_belongs_to_a_category()
    {
        // Create a category and a resource
        $category = Category::factory()->create([
            'name' => 'Anxiety',
        ]);

        $resource = Resource::factory()->create([
            'category_id' => $category->id,
            'title' => 'Managing Anxiety',
            'description' => 'A guide to managing anxiety.',
        ]);

        // Retrieve the resource and its associated category
        $retrievedResource = Resource::find($resource->id);

        // Check if the resource's category matches the expected category
        $this->assertEquals('Anxiety', $retrievedResource->category->name);
    }

    /** @test 2 */
    public function resources_can_be_filtered_by_category()
    {
        // Create multiple categories and resources
        $category1 = Category::factory()->create(['name' => 'Anxiety']);
        $category2 = Category::factory()->create(['name' => 'Depression']);

        Resource::factory()->create([
            'category_id' => $category1->id,
            'title' => 'Managing Anxiety',
            'description' => 'A guide to managing anxiety.',
        ]);

        Resource::factory()->create([
            'category_id' => $category2->id,
            'title' => 'Coping with Depression',
            'description' => 'A guide to coping with depression.',
        ]);

        // Filter resources by category
        $anxietyResources = Resource::where('category_id', $category1->id)->get();
        $depressionResources = Resource::where('category_id', $category2->id)->get();

        // Check that resources are filtered by their categories
        $this->assertCount(1, $anxietyResources);
        $this->assertEquals('Managing Anxiety', $anxietyResources->first()->title);

        $this->assertCount(1, $depressionResources);
        $this->assertEquals('Coping with Depression', $depressionResources->first()->title);
    }
}
