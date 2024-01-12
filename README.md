# README

## Idea Evaluation Tool

This tool facilitates the evaluation of individual ideas and assigns prioritization to a vast array of ideas. The evaluation is based on three custom-specified criteria:

- **Evidence:** Indicates the scientific basis.
- **Acceptance:** Gauges societal acceptance.
- **Impact:** Measures environmental impact.

### Dashboard

On the main screen, a dashboard displays all Problems and Solutions, including their total scores, Evidence Score, Acceptance Score, and Impact Score.

### Usage

1. Input table data containing Problems and Solutions in a CSV file.
2. Select the desired ideas.
3. Open the detailed view.
4. Click the Generate button to utilize ChatGPT for generating and outputting a numerical Score (on a 1 to 10 scale), Justification, and Evaluation.

### Output Format

While the Score is a numerical value on a 10-point scale, both the Justification and Evaluation are in text format, with the Evaluation being presented in a bulleted list.

## ChatGptController in Laravel

This is a Laravel controller named `ChatGptController` responsible for handling requests related to the ChatGPT integration. The controller includes methods for generating prompts, sending instructions to ChatGPT, and saving responses to the database.

### `generate_sen` Method

This method is responsible for sending generation instructions to ChatGPT based on the provided input. It validates the incoming request, extracts relevant data (such as ID, problem, and solution), and then generates a prompt for ChatGPT.

```php
public function generate_sen(Request $request)
{
    // Validation
    $request->validate([
        'id' => 'required',
        'problem' => 'required',
        'solution' => 'required',
    ]);

    // Extract data
    $id = $request->input('id');
    $problem = '"' . $request->input('problem') . '"';
    $solution = '"' . $request->input('solution') . '"';

    // Create prompt
    $out_data = "{'problem' : " . $problem . ", 'solution' : " . $solution . "}";
    $out_data = str_replace("\n", '', $out_data);
    $this->prompt_make($out_data, $id);
}
```

### `dict_res` Method

This method handles the response received from ChatGPT, saves relevant data to the database, and redirects to the details page.

```php
public function dict_res($outputs, $id)
{
    if ($outputs[0]) {
        // Process response
        $response = Storage::get('generated_data.txt');
        try {
            $responseData = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
            if (empty($responseData['error'])) {
                // Save data to the database
                $data = DemoIdeaScore::find($id);
                // ... (update database fields based on response)

                $data->save();

                // Redirect to details page
                return redirect()->route('details', ['id' => $id]);
            }
            // todo: Handle ChatGPT errors
        } catch (\JsonException $e) {
        }
    }
}
```

### `prompt_make` Method

This method is currently empty and might be intended for further implementation. Additional details or implementation instructions can be added here.

```php
public function prompt_make($out_data, $id)
{
    // Implementation details go here
}
```

## Controller in Laravel

This Laravel controller, named `Controller`, serves as the base controller for handling requests related to the application. It includes methods for rendering views and accessing data from the `DemoIdeaScore` model.

### `top`Methods

This method fetches all data from the `DemoIdeaScore` model and passes it to the `dashboard.top` view.

```php
public function top()
{
    $data = DemoIdeaScore::all();
    return view('dashboard.top', compact('data'));
}
```

## DemoIdeaScore in Laravel

This is a Laravel model named `DemoIdeaScore` representing an entity within your application. It extends the `Model` class and uses the `HasFactory` trait.

### Purpose

The `DemoIdeaScore` model is likely used to interact with a database table, providing an Eloquent representation of the data associated with a specific entity.

### Usage

In Laravel, models play a crucial role in interacting with databases, and they typically represent a table in the database. While the provided code for `DemoIdeaScore` is minimal, you can extend it by defining attributes, relationships, and other Eloquent features.

#### Example

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoIdeaScore extends Model
{
    use HasFactory;

    // Define table attributes, relationships, etc.
}
```

## Relationships

If DemoIdeaScore has relationships with other models, you can define them within the model class.

### Example

class DemoIdeaScore extends Model

```php
{
    use HasFactory;

    public function relatedModel()
    {
        return $this->hasOne(RelatedModel::class);
    }
}
```

## UserFactory

The UserFactory class is a Laravel Eloquent model factory responsible for generating fake data for the User model. It uses the Faker library to generate random and realistic data.

### Usage

This factory is used to seed the database with sample user data. You can customize the data generated by modifying the definition method in the UserFactory class.

```php
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
```
