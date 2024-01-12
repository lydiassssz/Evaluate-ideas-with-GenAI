<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use function Laravel\Prompts\text;

class ChatGptController extends Controller
{
    //chatGPTに生成命令を送る処理
    public function generate_sen(Request $request)
    {
        // バリデーション
        $request->validate([
            'id' => 'required',
            'problem' => 'required',
            'solution' => 'required',
            'api_key' => 'required',
        ]);

        $api_key = $request->input('api_key');

        // 文章
        $id = $request->input('id');
        $problem = '"'.$request->input('problem').'"';
        $solution = '"'.$request->input('solution').'"';

        $out_data = "{'problem' : " . $problem . ", 'solution' : " . $solution . "}";
        $out_data =  str_replace("\n", '', $out_data);
        $this->observe_chatGPT($out_data, $id, $api_key);
    }

    //レスポンスをデータベースに保存して元ページにリダイレクト
    public function dict_res($res_data, $id)
    {
        if($res_data){
                $data = DemoIdeaScore::find($id);
                $data->evidence = $res_data->Evidence->Score;
                $data->evidence_justification = $res_data['Evidence']['Justification'];
                $data->evidence_detail = $res_data['Evidence']['Evaluation'];
                $data->impact = $res_data['Impact']['Score'];
                $data->impact_justification = $res_data['Impact']['Justification'];
                $data->impact_detail = $res_data['Impact']['Evaluation'];
                $data->possible = $res_data['Possible']['Score'];
                $data->possible_justification = $res_data['Possible']['Justification'];
                $data->possible_detail = $res_data['Possible']['Evaluation'];

                $data->save();

                return redirect()->route('details', ['id' => $id]);

        }
    }


    public function observe_chatGPT($out_data, $id, $api_key)
    {

        //openAI APIエンドポイント
        $endpoint = 'https://api.openai.com/v1/chat/completions';
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        );

        $messages = array();
        $message = array();
        $message["role"] = "system";
        $message["content"] = "cow burps is negatively impacting the environment.\"
                                \"solution: Reduce meat consumption and the associated emissions of methane and carbon dioxide by promoting the sale of soy-based meat alternatives.\"
                                \"{\"Evidence\": {\"Score\": 9, \"Justification\"{\"I am an investor, and you are the expert advising me.\"
                                \"You will act as an idea validator and support me.\"
                                \"The role of an idea validator is to provide clear rationales and evaluations on fundamental metrics such as maturity, market potential, feasibility, scalability, technological innovation, and adherence to the principles of a circular economy, for the problems and solutions presented in an idea, thereby advising human evaluators.\"
                                \"An idea includes problems and solutions, and I will provide you with advice for evaluating these.\"
                                \"Here, we will evaluate the idea based on three criteria:\"
                                \"* Scientific Evidence (Evidence): Assessing the scientific basis and validity of the idea.\"
                                \"* Impact on the Environment (Impact): Evaluating the environmental effects and sustainability of the idea.\"
                                \"* Social Acceptance (Possible): Determining the likelihood of the idea being accepted and embraced by society.\"
                                \"For each of these criteria, I will provide expert opinions and various concrete examples.\"
                                \"Please refer to the following guidelines and Examples 1 and 2 when evaluating.\"
                                \"The guidelines include instructions that you should refer to when creating your response. Please adhere to these guidelines as much as possible when crafting your answer. However, if you think of additional aspects to evaluate that are not covered in the guidelines, feel free to actively add those evaluations.\"
                                \"Example1 and Example2 are ideal responses that you should refer to when formulating your answer.\"
                                \"To assist in determining whether to invest, please provide the following information in JSON format:\"
                                \"* Scores for the Idea Based on the Three Evaluation Criteria (each out of 10 points)\"
                                \"* Reasons for the Assigned Scores\"
                                \"* Evaluation in Accordance with the Guidelines (please base your evaluation on actual data as much as possible)\"
                                \"When calculating the \"Scores for the Idea Based on the Three Evaluation Criteria\" (each out of 10 points), please follow these conditions:\"
                                \"Lower Scores (Score: 0-5)\"
                                \"* Assign lower scores if:\"
                                \"    -The text lacks specificity.\"
                                \"    -The text is extremely short and difficult to understand, making it challenging to evaluate appropriately.\"
                                \"    -The idea is already widely considered.\"
                                \"    -The feasibility of the idea is extremely low.\"
                                \"    -The idea cannot be evaluated quantitatively.\"
                                \"Higher Scores (Score: 6-10)\"
                                \"* Assign higher scores if:\"
                                \"    -The text is specific.\"
                                \"    -The text is polite and easy to understand, allowing for appropriate evaluation of the idea.\"
                                \"    -The idea is innovative.\"
                                \"    -The idea has a high feasibility.\"
                                \"    -The idea can be evaluated quantitatively.\"
                                \"Under these conditions, please comprehensively evaluate the strengths and weaknesses of the idea and calculate the scores accordingly.\"
                                \"Note: Please ensure that scores are whole numbers.\"
                                \"When providing \"Reasons for the Assigned Scores,\" consider the following factors:\"
                                \"* Whether the text is specific.\"
                                \"* If the text is easy to understand\"
                                \"* Whether there is a sufficient amount of text to make an appropriate evaluation.\"
                                \"* If the idea is innovative.\"
                                \"* The feasibility of the idea.\"
                                \"* Whether the idea can be quantitatively evaluated.\"
                                \"Base your output on these considerations.\"
                                \"For the \"Evaluation in Accordance with the Guidelines,\" ensure to:\"
                                \"* Base your evaluation on actual data as much as possible.\"
                                \"* If you reference data, include the URL of the source where possible (ensure it is from an existing site).\"
                                \"Please output according to these conditions.\"
                                \"When outputting, please adhere to the following conditions:\"
                                \"* The output must always be in JSON format.\"
                                \"* All keys in the JSON must be enclosed in double quotations.\"
                                \"* Do not include any comments or content other than JSON.\"
                                \"* The output must be in the form of a JSON code block.\"
                                \"* Do not change the variable names from those presented in the example.\"
                                \"▼guidelines\"
                                \"1.Scientific Evidence[\"Evidence\"]\"
                                \"・Research and Data Analysis: Analyze existing research and data on the effectiveness of the idea, and evaluate its scientific validity.\"
                                \"・Comparative Analysis: Emphasize the superiority and efficiency of the new idea through comparison with traditional methods.\"
                                \"2.Impact of the Idea on the Environment[\"Impact\"]\"
                                \"・Direct Environmental Impact: Assess the direct impact of the idea on the environment (e.g., reduction of emissions, reuse of resources).\"
                                \"・Sustainability Assessment: Analyze the sustainability of the idea from a long-term perspective.\"
                                \"3.Whether the Idea Will Be Accepted by Society[\"Possible\"]\"
                                \"・Market Acceptability: Evaluate the likelihood of the idea being accepted in the market, and identify barriers to its adoption (such as cultural, economic, etc.).\"
                                \"・Feasibility of Implementation: Assess the barriers (technical, financial, regulatory, etc.) to practically implementing the idea.\"
                                \"▼Example1\"
                                \"Problem: The emission of carbon dioxide from \": \"The reason for the high score is that I judged each aspect to be scientifically feasible and effective.\", \"Evaluation\": [\"The proliferation of soy meat can lead to a reduction in meat consumption, which in turn would decrease the carbon dioxide and methane gas emissions associated with beef production.\", \"The cultivation of soybeans is more land-efficient and consumes less water resources compared to beef production, making it a more sustainable option.\", \"Methane gas emitted during the digestive process of cows is considered to have a stronger impact on global warming than carbon dioxide.\"]}, \"Impact\": {\"Score\": 8, \"Justification\": \"Soybean cultivation is more sustainable than beef production and leads to a reduction in methane gas emissions. However, a comprehensive assessment of the overall environmental impact is still required.\", \"Evaluation\": [\"The proliferation of soy meat can lead to a reduction in meat consumption, which in turn would decrease the carbon dioxide and methane gas emissions associated with beef production.\", \"The cultivation of soybeans is more land-efficient and consumes less water resources compared to beef production, making it a more sustainable option.\", \"In the production process of soy meat, there is still energy consumption and the generation of a certain amount of waste, so it is necessary to evaluate the overall environmental impact.\"]}, \"Possible\": {\"Score\": 7, \"Justification\": \"There is a potential for acceptance among consumers who are highly interested in this topic, and there is also the possibility of improving the texture. However, there is a possibility that it may not be accepted by some consumers, which is a negative point to consider regarding the acceptance of the idea in society.\", \"Evaluation\": [\"Soy meat as a meat substitute has the potential to be accepted not only by vegetarians and vegans but also by consumers who are highly concerned about health and the environment.\", \"With modern food technology, it is possible to improve the taste and texture of soy meat, leading to the development of products that can be accepted by a wider range of people.\", \"There is a possibility that some consumers may not accept soy meat due to biases against traditional meat products, taste differences, and cultural differences in dietary preferences. To overcome this, education and marketing strategies become crucial in promoting acceptance.\"]}}\"
                                \"▼Example2\"
                                \"Problem: Cow burps are serious.\"
                                \"solution: kill a cow.carbon dioxide decreases.Eat soy meat.\"
                                \"{\"Evidence\": {\"Score\": 4, \"Justification\": \"The difficulty in evaluation stems from the lack of specific scientific evidence and insufficient detailed information provided.\", \"Evaluation\": [\"The likelihood of promoting soy-based meat as a substitute for beef is considered low.\", \"The reasons for advocating a transition to soy-based meat are not clearly indicated.\", \"The environmental advantages of transitioning to soy-based meat are not clearly demonstrated.\", \"The specific evidence regarding the reduction of carbon dioxide emissions during the slaughter of cattle has not been provided.\"]}, \"Impact\": {\"Score\": 4, \"Justification\": \"The environmental impact of this idea lacks specific information, making it difficult to assess.\", \"Evaluation\": [\"Details about the environmental impact of beef are not specified.\", \"The environmental superiority of soy-based meat is unclear.\", \"Due to the lack of clear information on the environmental impact of product substitution, it is difficult to assess.\"]}, \"Possible\": {\"Score\": 4, \"Justification\": \"It is challenging to determine whether this idea would be socially accepted.\", \"Evaluation\": [\"The likelihood of promoting soy-based meat as a substitute for beef is considered low.\", \"The acceptance of soy-based meat in the market is unclear.\", \"Due to the lack of consideration for factors such as dietary culture, religion, and values, predicting social acceptance is challenging.
                                \"]}}" . $out_data;
        $messages[] = $message;


        $data = array();
        $data["model"] = "gpt-3.5-turbo-0613";
        $data["messages"] = $messages;


//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $endpoint);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        for ($count = 1; $count < 3; $count++) {
//            $response = curl_exec($ch);
//            curl_close($ch);
//            $response = json_decode($response, true);
//            $res = $response['choices'][0]['message'];
//            $res = $res['content'];
//            $res = json_encode($res);
            $res = '{"Evidence": {"Score": 7, "Justification": "The idea of using old tea bags as compost for soil is scientifically feasible and has been widely recognized as an effective method for improving soil quality.", "Evaluation": ["Using tea bags as compost can enrich the soil with organic matter, improving its fertility and nutrient content.", "Numerous studies have shown that compost made from tea leaves can increase soil moisture retention and enhance microbial activity, leading to healthier plants and increased crop yields.", "Tea leaves contain various beneficial compounds that can contribute to soil health, such as antioxidants and polyphenols.", "The decomposition of tea bags in the soil releases essential nutrients, such as nitrogen, phosphorus, and potassium, which are vital for plant growth."]}, "Impact": {"Score": 9, "Justification": "The idea of using old tea bags as compost for soil has significant positive environmental impacts and promotes sustainability.", "Evaluation": ["By diverting used tea bags from landfills and utilizing them as compost, it reduces waste and contributes to a circular economy.", "Tea bags can improve soil structure and promote water filtration, reducing the risk of soil erosion and water pollution.", "Using tea bags as compost reduces the need for synthetic fertilizers, which can have negative environmental impacts, such as nutrient runoff and soil degradation.", "The improved soil fertility and moisture retention from tea bag compost can enhance plant growth and resilience, leading to increased carbon sequestration and biodiversity."]}, "Possible": {"Score": 8, "Justification": "The idea of using old tea bags as compost for soil has good market potential and is likely to be accepted by society.", "Evaluation": ["There is a growing trend and demand for sustainable gardening practices, including the use of organic compost.", "Many gardeners and home growers are already using tea bags as compost and have experienced positive results.", "Using tea bags as compost aligns with the principles of organic and eco-friendly gardening, making it appealing to environmentally conscious consumers.", "With proper education and marketing, the idea can be effectively promoted and embraced by the gardening community."]}}';

            $pattern = '/{.*}/s';

            preg_match($pattern, $res, $matches);

            if ($matches) {
                $res = $matches[0];
            }
            try {
                $res = json_decode($res);
                $this->dict_res($res, $id);
                break;
            } catch (\JsonException $e) {
                if ($count === 2) {
                    $res_data = "Error in converting to dictionary";
                    dd($res_data);
                }
                continue;
            }
        }
    }

}
