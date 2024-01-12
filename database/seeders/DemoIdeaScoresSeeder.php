<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoIdeaScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('demo_idea_scores')->insert([
            [
                'id' => '1',
                'problem' => 'The solution is meant to solve the issue of electronic waste and reduce the heap of idle electronic products in our homes',
                'solution'=>'E waste has always been a growing problem in the world. The inclusion of circular economy techniques in our day to day life can bring about a huge change in this context. The consumer electronic goods that remains idle in our homes or is inoperative can be thought of as a means to implement the idea. If there exists a system which can collect the inoperative home consumer goods, extract the different parts like transistors, diodes, etc and make it to use in future products, I think it may reduce the problem of e waste marginally. Even if the parts are damaged, in some cases, trying to repair them can be much more cheap way than building a new component altogether. Thus even the manufacturing cost can be reduced. Also, there can be a quick supply of electronic components in the market. There can also be a responsible framework of second hand consumer electronic goods. Thus even the poor people can afford the best of consumer electronics without spending much from their pocket. This will include more people in the consumer electronics market which can in turn improve the market forces.',
                'evidence'=>'7',
                'evidence_justification' => 'The idea is scientifically feasible but lacks actual data and quantitative measures.',
                'evidence_detail' => '["The dismantling and repair of electronic products for reuse is mechanically possible and is already widely practiced.","While no specific scientific or experimental data was provided, the idea is grounded in established principles of recycling and electronics manufacturing.","Still, a more detailed analysis comparing this method with traditional practices can help in assessing its actual efficiency and effectiveness."]',
                'impact'=>'8',
                'impact_justification' => '"Implementing this idea can positively impact the environment by reducing waste, although actual numeric measures are not provided."',
                'impact_detail' => '["By recycling and reusing parts from inoperative electronic goods, the amount of e-waste produced can be significantly reduced.","It promotes the principles of a circular economy by ensuring that resources are not merely discarded, but reutilized, resulting in a reduction of resource consumption and thus leading to long-term sustainability.","However, the process of collecting, disassembling, and repairing electronic components may entail additional environmental costs such as energy and carbon emissions during transport, and these factors need to be evaluated to get a more comprehensive overview of the environmental impact."]',
                'possible'=>'8',
                'possible_justification' => '"This idea has potential for societal acceptance, given the increasing awareness about sustainability, although practical hurdles need to be addressed."',
                'possible_detail' => '["The proposal to provide affordable second-hand electronic goods can be appealing to certain consumer groups especially in developing countries.However, the main barriers to this idea may involve implementation such as collection logistics, repairing facilities, and regulatory compliance regarding electronic waste management.","Moreover, the perception towards second-hand goods varies across cultures and societies, and convincing consumers to trust the quality and reliability of these goods may pose a challenge. Creating awareness and robust quality control systems are key to gaining wider societal acceptance."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '2',
                'problem' => 'Create Awareness of the propensity of Reduce, Reuse, Brick building',
                'solution'=>'"I have developed this solution in the construction sector and I got the initiative from a course I took termed ""Waste Management in Developing Countries"" from Couserra and my point of reference being that quite alot of materials still end up as gabbage in my country and also in the building & construction.
The application of concrete which is a mixture of gravel, cement, sand and water with the addition of metals mostly in the construction of beams and pillars has its drawbacks as the metal\'s rust with time and it\'s main function of withholding the tensile stress of the load is eroded leading to the weakening of such structures and their eventual collapse.

I have made 5 bricks using natural materials
-crushed granite
-beach sand
-crushed bottles
-cement
-clay
-water

In different proportions in order that they may be used in water logged areas and also so the world can have a concrete structure without metals included in the casting thereby retaining the strength of the structure using crushed bottles instead which also has the needed stress holding capacity when reacted with cement as well as luminance and giving beauty.

However, it is to be noted that this work is still subject to evaluation. Also in making the bricks, I was confident of the success of the innovation because
- clay is abundant in Nigeria
-houses built with clay bricks have a longer lifespan than traditional bricks
-clay bricks are also more environmentally sustainable
-a large chuck of bottles are still discarded here or simply broken to pieces and a minute quantity going to recycling

I also desire to improve on the strength of the bricks because I employed sun drying to remove the moisture content. I wish to employ oven drying and subject them to hotness and coldness test. Also I aim to build my own house with the bricks even if it\'s not accepted globally."',
                'evidence'=>'7',
                'evidence_justification' => 'The idea is innovative and leverages local materials. However, complete scientific testing and validation has not yet been fully conducted.',
                'evidence_detail' => '["The concept of utilizing locally available and recycled materials such as clay, crushed granite, beach sand, crushed bottles, and cement to make bricks is innovative.","The proposed solution addresses a tangible issue in the construction industry, providing a logical and plausible alternative to concrete and metal construction.","The use of clay bricks is rooted in established traditional practices, often noted for their durability and eco-friendliness. There is, however, not enough clear evidence provided to conclusively prove the long-term strength and resilience of the innovated bricks.","There are concerns about the overall quality of the bricks, especially under various environmental conditions and stresses. The sun-drying method might not achieve the optimum strength and efficacy of the bricks, but the proposer acknowledges this and intends to improve on it via oven-drying methods."]',
                'impact'=>'8',
                'impact_justification' => 'The idea, if correctly implemented, could have a significant positive impact on the environment through the reduction of waste and increased sustainability of construction methods.',
                'impact_detail' => '["The use of waste materials, such as discarded bottles, reduces overall waste production, promoting a circular economy.","The use of locally available materials reduces the carbon footprint associated with transportation of construction materials.","The utilization of clay, an eco-friendly and abundant resource in Nigeria, could potentially reduce the destructive extraction and use of other natural resources.","However, the environmental impact of the proposed brick production, including the use of oven-drying methods, should be further evaluated to ensure overall sustainability."]',
                'possible'=>'6',
                'possible_justification' => 'While the idea is innovative and tackles an existing problem, there may be implementation challenges, including technical feasibility, regulatory approval, and market acceptance.',
                'possible_detail' => '["The economic feasibility of mass-producing these bricks is unclear. Also, the inclusion of crushed bottles in the mix may prove technically challenging and require further research and refinement.","From a regulatory perspective, the use of these bricks in construction might need approval from building codes and standards authorities, which could impose additional layers of complexity.","Market acceptability is uncertain. While the proposer manifests determination to use the bricks in their own construction, wider public acceptance might not be easily guaranteed without thorough quality and safety assurances.","Investment in appropriate marketing strategies and educational initiatives might be required to overcome potential resistance from conventional builders and clients."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '3',
                'problem' => 'Encourages a culture of sharing and minimizes waste by reducing the need for customers to buy and dispose of products.',
                'solution'=>'Companies can offer products as a service, where customers pay for access or usage rather than ownership. This can be done through subscription models or pay-per-use systems.',
                'evidence'=>'8',
                'evidence_justification' => 'The idea is supported by a growing body of business and economic research. However, details about specific types of products or industries this could be most effective for were vague.',
                'evidence_detail' => '["Product-as-a-service (PaaS) models have been shown to be effective for certain types of goods, such as software or digital media, but may not be applicable to all types of goods. (Source: McKinsey & Company - https:\/\/www.mckinsey.com\/business-functions\/mckinsey-digital\/our-insights\/guide-to-subscription-business-models-in-b2b)","A PaaS model could encourage consumers to use products more sustainably, and may reduce waste compared to traditional ownership models.","Research is needed to determine how different industries and types of goods may adapt to or benefit from PaaS models."]',
                'impact'=>'7',
                'impact_justification' => 'The idea could positively impact the environment by reducing waste, however its sustainability depends on implementation details.',
                'impact_detail' => '["Implementation of PaaS could lead to reduced waste if products are designed for longer lifetimes, eco-friendly disposal, or to be easily refurbished.","PaaS models could potentially contribute to a circular economy by promoting the use of shared resources. (Source: Ellen Macarthur Foundation - https:\/\/www.ellenmacarthurfoundation.org\/explore\/policies-for-a-circular-economy)","However, PaaS models could potentially lead to more waste if not managed properly. For example, if products are regularly replaced with newer models, the old ones may end up in landfills.","A thorough lifecycle analysis would be needed to fully understand the environmental impact of a PaaS model for a given product or industry."]',
                'possible'=>'6',
                'possible_justification' => 'PaaS models have been successfully implemented in some industries, suggesting market acceptability. However, potential barriers could hinder wide-spread adoption.',
                'possible_detail' => '["While the sharing economy and subscription models have gained popularity in certain sectors, such as streaming services and car sharing, they may not be easily accepted or practical in all markets.","Barriers to the adoption of PaaS models could include consumers desire to own products, resistance to change, or the impracticality of shared use for certain types of goods.","Legal and regulatory implications, such as those related to product liability, could also pose challenges to the implementation of PaaS models."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '4',
                'problem' => 'The construction industry is indubitably one of the significant contributors to global waste, contributing approximately 1.3 billion tons of waste annually, exerting significant pressure on our landfills and natural resources. Traditional construction methods entail single-use designs that require frequent demolitions, leading to resource depletion and wastage. ',
                'solution'=>'Herein, we propose an innovative approach to mitigate this problem: Modular Construction. This method embraces recycling and reuse, taking a significant stride towards a circular economy. Modular construction involves utilizing engineered components in a manufacturing facility that are later assembled on-site. These components are designed for easy disassembling, enabling them to be reused in diverse projects, thus significantly reducing waste and conserving resources. Not only does this method decrease construction waste by up to 90%, but it also decreases construction time by 30-50%, optimizing both environmental and financial efficiency. This reduction in time corresponds to substantial financial savings for businesses. Moreover, the modular approach allows greater flexibility, adapting to changing needs over time. We believe, by adopting modular construction, the industry can transit from a "take, make and dispose" model to a more sustainable "reduce, reuse, and recycle" model, driving the industry towards a more circular and sustainable future. The feasibility of this concept is already being proven in markets around the globe, indicating its potential for scalability and real-world application.',
                'evidence'=>'9',
                'evidence_justification' => 'The idea presented gives concrete evidence related to current global waste generation and the impact of traditional construction methods, while also presenting studies that prove the viability of modular construction.',
                'evidence_detail' => '["Modular Construction has been verified to decrease construction waste by 90% whilst also reducing construction time by 30-50% which is highly sustainable and efficient.","The feasibility of Modular Construction has already been proven in markets around every corner of the globe, implying the practical real world application of this concept.","Although substantial data on the large-scale implications of this is scarce, a thorough impact evaluation should be carried out on the efficiency of Modular Construction method given its increasing popularity."]',
                'impact'=>'8',
                'impact_justification' => 'The idea clearly mentions specific impacts in waste reduction and conservation of resources, yet more data is needed to specifically gauge the environmental impact.',
                'impact_detail' => '["Modular Construction is designed to decrease waste and conserve resources which tackles the current problem of environmental degradation and resource depletion.","Through adoption of this method we could move from a take, make, and dispose model to a sustainable reduce, reuse, and recycle model.","More data on specifically how this model interacts with and impacts the environment at each stage is needed in order to develop an accurate picture."]',
                'possible'=>'8',
                'possible_justification' => 'This concept has already been proven in various markets thus proving its viability. While there are still obstacles to overcome, the idea certainly has potential for real-world application.',
                'possible_detail' => '["Modular Construction has already been adopted in various markets around the world which reinforces the feasibility of implementing such an idea.","The construction industry would need to introduce new training and skills due to the transition from traditional construction methods to modular construction.","There might be some regulatory and standardization challenges that would need to be overcome in various markets."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '5',
                'problem' => 'One major global issue we face today is the surplus of plastic waste. Single-use plastics are commonly used for packaging in various sectors, like retail, food, and manufacturing. These plastics, often non-recyclable or ignored during waste management, clog up our oceans, harm wildlife, and end up in landfills, where they take hundreds of years to degrade. Furthermore, producing these plastics requires a significant amount of energy and resources and contributes to environmental degradation. ',
                'solution'=>'My solution is an innovative Reloop - System, which involves a comprehensive "Packaging as a Service" model for businesses across sectors. In the first step, productions and businesses would eliminate their need for newly produced plastic packaging whenever possible, by collaborating with a "Packaging as a Service" provider. Each business would regularly receive high-quality, standardized, reusable containers from the service. They fill these containers with their products, and after distribution, the used containers are rounded up from retail stores or directly from consumers. The second step involves the cleaning and sanitation process. Gathered containers are mechanically cleaned and sterilized, making them ready for reuse. As these containers are durable and designed for multiple uses, this process significantly reduces the demand for single-use plastics. Lastly, the circular nature of this model ensures massively reduced plastic waste production and encompasses a viable financial model. Businesses save money by reducing expenditure on plastic packaging production or procurement. The service creates new job opportunities in the collection, cleaning, and redistribution of containers, contributing to the economy. While this idea may face implementation challenges due to existing infrastructures and systems, its long-term benefits and scalability make it a feasible solution to the current plastic waste problem.',
                'evidence'=>'8',
                'evidence_justification' => 'The text is thorough, presents a process well-thought and grounded on reality. However, it lacks references to scientific studies proving its efficiency and effectiveness.',
                'evidence_detail' => '["The innovation of the \"Packaging as a Service\" model demonstrates the possibility of significantly reducing the use of single-use plastics.","The circular model of the solution could significantly decrease plastic waste, but specific studies proving this reduction are not presented.","The idea is well defined, but there is no indication of research validating its effectiveness."]',
                'impact'=>'9',
                'impact_justification' => 'The environmental impacts are well addressed, and the model is circularity should reduce plastic waste, if implemented effectively.',
                'impact_detail' => '["This solution could significantly reduce the production of plastic waste and its associated environmental impacts, from resource extraction to waste management.","The circular model emphasizes the reuse of resources, which aligns with the principles of a sustainable economy.","The standardized containers for multiple uses are a step towards establishing a zero-waste lifestyle, however, considerations regarding the materials and their life cycles used for these containers are not mentioned."]',
                'possible'=>'7',
                'possible_justification' => 'Market factors and possible technical, regulatory challenges were considered but details on how to overcome these barriers and the public opinion on such a solution were not addressed.',
                'possible_detail' => '["The \"Packaging as a Service\" model has potential economic benefits for businesses, signalling market acceptability.","The creation of job opportunities is a positive social impact, however, implication details and other social aspects are not discussed.","While the idea anticipates possible challenges such as infrastructural adjustments, it doesn\'t lay out a strategy for overcoming these barriers."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '6',
                'problem' => 'The fashion industry contributes about 10% of global CO2 emissions, with fast fashion being the major contributor. Fast fashion leads to the creation of end-of-life waste, where 85% of textile waste ends up in landfills or is incinerated. Furthermore, the industries involved in the production of fast-fashion are found in developing countries where workers face poor working conditions, and economies struggle due to rising waste management costs. ',
                'solution'=>'Full Turn Fashion is a comprehensive circular economy model designed to tackle fashion waste and pollution. Ushering the paradigm shift from usual produce-use-dispose to reduce-reuse-recycle, we encourage consumers to return their worn-out clothing which we will collect, sort and recycle into unique, locally produced garments. Wastes unsuitable for direct recycling will be decomposed to produce organic dyes and materials. Operating specifically within fast-fashion importing countries, these processes involve local SMEs and communities, promoting local economy growth and creating jobs. Financial feasibility is achieved through revenue from the sale of upcycled apparel and premium value added to Geographical Indication. Our model is scalable, with potential for network expansion across other fast-fashion importing countries, steering the global fashion industry towards sustainability.',
                'evidence'=>'8',
                'evidence_justification' => 'The problem and its impacts are well-articulated with firm basis and the solution proposed leverages the circular economy model, making it scientifically sound and effective.',
                'evidence_detail' => '["The environmental and socioeconomic impacts of the fast-fashion industry are well documented. Its contribution to CO2 emissions and global waste is a pressing issue.","The circular economy model has been proposed and supported by several studies as a sustainable solution for a variety of sectors, including the textile industry.","The processes involved in the proposed model further attest to its scientific validity, from upcycling worn-out clothing, to waste decomposition for organic dyes and promoting local economies."]',
                'impact'=>'9',
                'impact_justification' => 'The proposed idea directly aims to mitigate the fast-fashion industry of environmental footprint and promotes sustainability, which aligns with the principles of a circular economy.',
                'impact_detail' => '["The initiative cuts down on CO2 emissions and waste by transforming used clothes into new garments, eliminating waste.","The decomposition of unfit waste to produce organic materials further reduces its environmental impact.","By stimulating local economies, it indirectly helps developing countries tackle waste management, creating jobs and ploughing back money to the economy."]',
                'possible'=>'8',
                'possible_justification' => 'The solutions brought forward are highly feasible and effective. Still, a culturally ingrained shopping habit shift is challenging and may require effective education and convincing marketing strategies.',
                'possible_detail' => '["The shift from a consumerist model to a more sustainable one is being reflected in current market trends, making this idea likely to be accepted by an environmentally conscious demography.","Buy-back programs have previously been successful in industries like automotive and electronics, the fashion industry could follow suit.","However, fast fashion of instant gratification may pose some resistance, requiring effective marketing and education about the environmental and socioeconomic benefits."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '7',
                'problem' => 'One of thea largest contributors to landfill waste is plastic packaging. Every year, millions of tons of single-use plastic packaging material end up in rivers, oceans, and landfills - leading to significant environmental damage. This issue presents a significant problem for businesses that rely on packaging for their products but are increasingly under pressure to adopt more sustainable practices.  ',
                'solution'=>'I propose the implementation of a Deposit Return System (DRS) for businesses that heavily rely on packaging. In a DRS, consumers pay a small deposit when they buy a packaged product. When they return the empty packaging, they receive their deposit back. This system creates a circular economy because packaging is returned, and then cleaned, refilled, and reused - often numerous times. For businesses, the DRS will reduce packaging costs in the long term and strengthen brand reputation as a sustainable entity. Simultaneously, it will encourage consumers to avoid littering, thus reducing environmental damage. The DRS system has already shown success in many areas worldwide and it can be easily scaled and adopted by various industries.',
                'evidence'=>'8',
                'evidence_justification' => 'The implementation of a Deposit Return System (DRS) is scientifically evidenced and grounded in real-world applications. However, extensive data on the effectiveness of this approach across various industries is not provided.',
                'evidence_detail' => '["DRS has been implemented and proven successful in some regions worldwide.","The mechanism of DRS is scientifically sound and logical.","Nonetheless, more extensive data detailing the full scope of DRS effectiveness across industries and regions would have added more weight to the idea."]',
                'impact'=>'9',
                'impact_justification' => 'Should the DRS be successfully implemented, it holds great potential for a significant reduction in environmental plastic waste damage. However, the overall environmental impact considering regulatory and logistic challenges still needs to be assessed properly.',
                'impact_detail' => '["DRS could massively reduce the amount of single-use packaging waste ending up in landfills, rivers, and oceans.","The DRS is a system that supports a circular economy, which is sustainable and environmentally friendly.","Gains from the DRS system have to be balanced against any environmental cost that might come due to potential increase in logistics and transportation."]',
                'possible'=>'7',
                'possible_justification' => 'While there are instances of successful DRS implementations, it is worth considering potential resistance from businesses to alter well-established processes, and also consumer behavioral change is a critical factor.',
                'possible_detail' => '["The success seen from implementing DRS in several areas globally suggests broad potential for market acceptance.","However, some businesses may hesitate to change from the status quo due to initial costs or disruption during transition.","For this system to work effectively, there needs to be a significant shift in consumer behavior, which may be influenced by various factors, including socio-economic and cultural factors."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '8',
                'problem' => 'The linear "take, make, dispose" model of production and consumption contributes vastly to greenhouse gas emissions and depletion of natural resources. In this system, valuable materials end up in landfill, contributing to pollution, and creating a demand for more resource extraction, thus repeating the harmful cycle.   ',
                'solution'=>'["There is a significant amount of research indicating that the circular economy model can help reduce greenhouse gas emissions and dependence on finite natural resources.","Businesses such as grocery stores and urban farms stand to benefit economically from the implementation of circular food systems, such as waste management and recycling programs.","The concept of eco-design in product creation also has scientific merit, with the potential to reduce raw material costs and waste while improving brand image."]',
                'evidence'=>'8',
                'evidence_justification' => 'The idea is grounded in extensive research and data, and the proposed solutions are supported by scientific evidence.',
                'evidence_detail' => '["There is a significant amount of research indicating that the circular economy model can help reduce greenhouse gas emissions and dependence on finite natural resources.","Businesses such as grocery stores and urban farms stand to benefit economically from the implementation of circular food systems, such as waste management and recycling programs.","The concept of eco-design in product creation also has scientific merit, with the potential to reduce raw material costs and waste while improving brand image."]',
                'impact'=>'8',
                'impact_justification' => 'The idea has a strong potential for positive environmental impact through reduced emissions and resource demand. The two-pronged approach addresses both the production and consumption sides of the circular economy principles.',
                'impact_detail' => '["The proposed solutions, including waste management and recycling programs, can significantly reduce greenhouse gas emissions associated with food waste.","Eco-design can also have a dramatic environmental impact by reducing demand for raw materials and limiting waste.","The implementation of these practices also has the opportunity to stimulate local economies, increasing the possibility of widespread adoption and long-term sustainability."]',
                'possible'=>'7',
                'possible_justification' => 'While there are clear economic and environmental benefits associated with both circular food systems and conscious product design, implementing these practices on a large scale represents a significant challenge due to cultural, economic, and regulatory barriers.',
                'possible_detail' => '["There are significant barriers to the implementation of these practices, including the cost of restructuring, resistance from established industries, and potential regulatory hurdles.","However, the growing environmental awareness among consumers and the economic benefits associated with these practices represent encouraging signs for societal acceptance.","The implementation of these practices may require government support and regulatory changes to be successfully adopted on a large scale."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '9',
                'problem' => 'The conundrum we face is the improper disposal of sanitary pads and diapers, a concern which intensifies environmental harm and health risks. Globally, billions of these products are discarded annually, enduring centuries to decompose. The current methods of disposal landfills and incineration culminate in toxic releases that contaminate air, water, and soil. Growing consumption of these single-use products indicates an unsustainable waste management system unable to handle this load efficiently.  ',
                'solution'=>'The proposed solution is a cutting-edge recycling machine transforming waste sanitary products into wood pulp and plastic grains. This process, comprising shredding, cleaning, and transformation, redeploys waste as a resource. The resulted raw materials can be resold, substituting virgin resources in various industries. This technology profoundly revolutionizes waste management by providing an environmentally-conscious, comprehensive approach to these specific waste products.  Besides reducing environmental impact, this approach presents economic benefits. The resale of raw materials supplies a revenue stream, and machine installation in various offices and societies could lead to a potentially rapid return on investment. Implemented already by companies like Goldman Sachs and Capgemini in India, the solution exhibits promising signs of scalability and international feasibility. Notwithstanding, an extensive feasibility assessment would be pertinent, considering varying waste management laws, infrastructure, and societal norms worldwide.',
                'evidence'=>'8',
                'evidence_justification' => 'This idea presents a functional solution and is built on established recycling principles. Additionally, its implementation in various companies lends credibility to the scientific foundation of the concept.',
                'evidence_detail' => '["The method of transforming waste sanitary products into wood pulp and plastic grains is scientifically feasible, as it is a reiteration of existing recycling processes.","The fact that renowned companies have adopted this solution is a validation of its scientific basis.","However, specific research sources validating the efficiency of the transformation process are not presented."]',
                'impact'=>'9',
                'impact_justification' => 'The solution suggests considerable benefits for the environment by reducing the volume of sanitary waste in landfills and mitigating the harmful emissions associated with disposal. Additionally, it promotes circular economy principles by facilitating the reuse of waste as a resource.',
                'impact_detail' => '["The reduction of sanitary waste in landfills and incineration facilities decreases the potential for soil, water, and air contamination.","The transformation of waste materials into reusable resources aligns with the principles of the circular economy.","By substituting virgin resources, the solution reduces the consumption of natural resources and further lessens environmental impact. However, the energy consumption and potential waste production of the machine should be considered for a comprehensive environmental assessment."]',
                'possible'=>'7',
                'possible_justification' => 'The technology of introduction into well-known global companies infers market acceptance and its potential large-scale implementation. However, challenges could ensue because of varying waste management policies and societal norms across countries.',
                'possible_detail' => '["The adoption of the recycling machine by companies like Goldman Sachs and Capgemini in India indicates some market acceptance and scalability.","The revenue generated from the sale of the product of outputs could encourage other entities to consider adoption, thereby facilitating wider market reach.","However, regulatory barriers, differing societal perceptions towards sanitary waste handling, and infrastructural discrepancies across different countries may pose challenges to implementing this solution globally."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '10',
                'problem' => 'This solution will help the vegetation',
                'solution'=>'Use old tea bags as compost for soil',
                'evidence'=>'7',
                'evidence_justification' => 'The idea of using tea waste as compost is scientifically valid with numerous studies supporting the benefits of composting organic waste, however, the text lacks specific research.',
                'evidence_detail' => '["Tea waste, being organic, can decompose and turn into compost which improves soil quality.","However, more in-depth scientific research is required to understand the impact of tea waste on different types and pH of soils."]',
                'impact'=>'8',
                'impact_justification' => 'Using tea waste as compost will reduce the amounts of organic waste ending up in landfills, which will directly contribute to reducing greenhouse gas emissions. The conducted impact on the environment is based on general composting knowledge.',
                'impact_detail' => '["The idea will help in reducing the amount of organic waste ending up in landfills which is beneficial to the environment.","Composting tea waste will enrich the soil with nutrients supporting plant growth.","Since compost decomposes at a slow rate, it improves the structure and water holding capacity of the soil."]',
                'possible'=>'7',
                'possible_justification' => 'Acceptance by society is likely as composting is not a new concept and individuals are becoming more environmentally conscious. However, the success depends on proper implementation and education on composting techniques.',
                'possible_detail' => '["Given the increasing awareness on the environment, society will likely accept the idea of composting tea waste to improve soil quality.","However, the feasibility of implementation will require proper education on composting techniques.","Furthermore, to make this idea widespread, regulatory bodies might need to work on policies promoting composting."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '11',
                'problem' => 'Accumulation and improper disposal of single-use plastics are causing severe environmental problems worldwide, contributing to land, water, and air pollution. These plastics take hundreds of years to decompose, threatening biodiversity and contributing to climate change. Additionally, the costs associated with waste management and the loss of potential economic value from these materials are significant issues for businesses and economies.  ',
                'solution'=>'My proposed solution is to implement an innovative recycling process that transforms single-use plastic waste into interlocking tiles. Instead of discarding single-use plastic, businesses can create a take-back system where customers return the plastic waste. Specialized recycling facilities can then convert the wastes into durable, weather-resistant interlocking tiles that can be used for construction purposes, creating a market for recycled plastic products. This waste-into-resource model not only reduces the environmental impact of plastic waste but also generates new revenue streams for businesses, providing a strong financial incentivize to support recycling initiatives. Scalability is feasible as the demand for construction tiles is high and global, plus the single-use plastic waste input is virtually unlimited. This solution embodies the circular economy model, ensuring materials keep circulating within the economy, reducing waste and environmental harm while creating economic value.',
                'evidence'=>'8',
                'evidence_justification' => 'The idea is built upon established practices and models, but missing scientific evidence to substantiate its effectiveness',
                'evidence_detail' => '["There exist various methods to recycle single-use plastic into usable materials. While this specific process (plastic waste into interlocking tiles) is not widely documented, similar procedures do exist, suggesting feasibility.","The idea would benefit from further investigation into the science and engineering required for the conversion process, its efficiency, costs, and the physical properties of the resulting product.","Although this solution does not provide comparative analysis with existing recycling methods, circular economy principles imply it is potentially more economic and sustainable than linear models."]',
                'impact'=>'9',
                'impact_justification' => 'The solution not only tackles the plastic pollution problem but also reintegrates waste back into the economy, closely aligning with the principles of a circular economy.',
                'impact_detail' => '["By transforming waste into a resource, we decrease the amount of single-use plastics that end up polluting the environment, thus reducing the harmful effects to biodiversity and mitigating contributions to climate change.","Creating a new market for recycled plastic products should stimulate further innovation in plastic waste management, increasing overall sustainability.","However, the production process should be scrutinised for potential environmental costs. Energy usage, waste, emissions during manufacture, and lifecycle of the tiles should be considered."]',
                'possible'=>'8',
                'possible_justification' => 'The practicality of the idea seems high, yet its acceptance will depend on societal willingness to adapt new behaviors and businesses readiness to adopt this model.',
                'possible_detail' => '["The idea entails alterations in consumer behavior (returning plastic waste) and in business practice (take-back system, recycling facilities). The success of the idea largely depends on acceptance by both parties.","The market potential seems huge given the global demand for construction materials. The concept also addresses a pervasive waste management problem, heightening its potential value.","Key barriers to implementation include compliance with various regulations, securing necessary partnerships, investment, equipment, and training for the recycling process."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => '12',
                'problem' => 'The excessive and wasteful resource consumption of traditional press institutions, which leads to both environmental and economic strains.  ',
                'solution'=>'Transformation to a sustainable, digital-focused solution to radically reduce the carbon and financial footprint of press institutions.  *Embracing the Digital Transition* Dramatically reducing the printing of physical newspapers and magazines, and instead focusing on enhancing online platforms, apps, and PDF releases. This will not only reduce paper, ink, and operational costs but also result in a significant decrease in emissions related to print production and distribution.   *Sharing Economy - Freelance Contributors:* To tackle job-related issues, implement a model that emphasizes "sharing and collaborative economy" by inviting freelance authors, photojournalists, and editors who get paid per contribution. This leads to job creation, a broader spectrum of content, and a win-win situation for both employer and employee.  *Digital Advertising Revamp:*   Expand the advertising system to innovative digital ads, leveraging the power of AI and Big Data for personalized and target advertisement. This will also increase the competitive edge and could potentially maximize profit margins.  *Success through Partnerships:* Form alliances with graphic design institutions or schools, providing them advertising space in the digital media platform. In return, these institutions can supply artwork or creatives thus reducing the cost of creating a dedicated creative team.  *Sustainable Print Solutions:*  In scenarios where physical printing cannot be avoided, collaborations with responsible, local printing companies which use sustainable methods like recycled paper are to be executed.  *Resource Circulation:* All pre-used and leftover resources can be sold or donated to small businesses, craftspeople, or charitable organizations, turning "waste" into "wealth" and fostering a real circular economy.    In this way, press institutions can evolve to be more sustainable, cost-effective, and community-friendly, all while supporting the circular economy. This solution not only mitigates resource wastefulness, it also increases revenue through innovative digital transformations.',
                'evidence'=>'9',
                'evidence_justification' => 'The idea presents a comprehensive, well-crafted plan aiming for a digital transformation of traditional press institutions, which can be scientifically justified and currently relevant as it involves technologies.',
                'evidence_detail' => '["The transition to digital media is in line with the current societal shift towards digitization and holds scientific basis. Most of the modern societies have access to internet to receive news and information.","The sharing economy model presented, fostered by freelance contributions, is a proven model in many industries. This introduces diversity of content and could potentially attract broader audience.","The use of AI and Big Data in advertising has been scientifically proven effective for targeting personalized advertisements. This can potentially increase advertising revenue.","The partnership model with graphic design institutions for ad space in exchange of artwork reduces operational costs and stands on mutual benefit which has been applied in various sectors."]',
                'impact'=>'8',
                'impact_justification' => 'The idea is capable of reducing the environmental footprint of press institutions, specifically pertaining to emission reduction, resource conservation and promoting circular economy.',
                'impact_detail' => '["By minimizing the printing of physical newspapers and enhancing online platforms, it will significantly reduce the consumption of resources (paper, ink) and decrease waste generation.","In scenarios where physical printing is necessary, the idea promotes collaborations with local printing companies that use sustainable methods or recycled prints, minimizing the environmental impact.","The resource circulation aspect promotes the reuse of pre-used and leftovers, enhancing the circular economy principle."]',
                'possible'=>'8',
                'possible_justification' => 'Given the society of growing preference for digital platforms, the potential for acceptance of this idea is high. However, it might face resistance from traditional press institutions and a section of the audience preferring printed news.',
                'possible_detail' => '["Digital media of growing popularity makes it likely that consumers would accept and adapt to the digital transformation of traditional press entities.","The implementation could face resistance from traditional newspapers or older demographics who prefer printed news, which could slightly hinder acceptance.","The sharing economy model could be widely accepted as it opens up opportunities for independent contributors."]',
                'length' => '0',
                'note' => null,
                'created_at' => null,
                'updated_at' => null
            ],

        ]);
    }
}


